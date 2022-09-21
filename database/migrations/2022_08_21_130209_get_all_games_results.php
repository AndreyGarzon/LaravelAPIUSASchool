<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "
        CREATE  PROCEDURE GetAllGeneralResults(IN InitialDate DATE,IN EndDate DATE,IN GroupQuery INT, IN ReporQuery INT, IN TypeReporQuery INT)
        BEGIN 

        IF TypeReporQuery =  1
        THEN
        DROP TABLE IF EXISTS GameResults;
        CREATE TEMPORARY TABLE IF NOT EXISTS  GameResults (
            SELECT 	
			date_,
			time_,
            student_name,
			ROUND(((SUM(IF(game_group_id = 1, correct_answer, null))/ SUM(if(game_group_id = 1, total_answer, null)))*100),0)    AS Letter_Recognition,
			ROUND(((SUM(IF(game_group_id = 2, correct_answer, null))/ SUM(if(game_group_id = 2, total_answer, null)))*100),0)    AS Sound_Recognition,
            ROUND(((SUM(IF(game_group_id = 3, correct_answer, null))/ SUM(if(game_group_id = 3, total_answer, null)))*100),0)    AS Pre_K_Dolch_Sight_Words,
            ROUND(((SUM(IF(game_group_id = 4, correct_answer, null))/ SUM(if(game_group_id = 4, total_answer, null)))*100),0)    AS Kindergarten_Dolch_Sight_Words,
            ROUND(((SUM(IF(game_group_id = 5, correct_answer, null))/ SUM(if(game_group_id = 5, total_answer, null)))*100),0)    AS First_Grade_Dolch_Sight_Words,
            ROUND(((SUM(IF(game_group_id = 6, correct_answer, null))/ SUM(if(game_group_id = 6, total_answer, null)))*100),0)    AS Second_Grade_Dolch_Sight_Words,
            ROUND(((SUM(IF(game_group_id = 7, correct_answer, null))/ SUM(if(game_group_id = 7, total_answer, null)))*100),0)    AS Third_Grade_Dolch_Sight_Words,
            ROUND(((SUM(IF(game_group_id = 8, correct_answer, null))/ SUM(if(game_group_id = 8, total_answer, null)))*100),0)    AS Noun_Dolch_Sight_Words
            
            FROM 
	(
        SELECT 
			STU.first_name AS student_name,
            RES.id,
            GRU.teacher_id,
            STU.group_id,
            SES.student_id,
            STU.code,
            RES.game_id,
            RES.game_option_id,
            CAST(SES.created_at AS DATE) date_,
			CAST(SES.created_at AS TIME(0)) time_,
            REPLACE(GAM.game_name,' ','_') game_name,
            GOP.game_option_name,
            REPLACE(GRO.game_group_name,' ','_') game_group_name,
            GRO.id AS game_group_id,
            CASE WHEN GOP.game_option_name = 'TRUE' THEN 1 ELSE 0 END AS correct_answer,
            CASE WHEN GOP.game_option_name = 'FALSE' THEN 1 ELSE 0 END AS incorrect_answer,
            CASE WHEN GOP.game_option_name = 'NULL' THEN 1 ELSE 0 END AS unknown_answer,
            1 AS total_answer
        
        FROM
            usaschool.game_results AS RES
                LEFT JOIN 
            usaschool.session_games AS SES ON RES.session_game_id = SES.id
				LEFT JOIN
            usaschool.students AS STU ON SES.student_id = STU.id
                LEFT JOIN 
            usaschool.groups AS GRU ON STU.group_id = GRU.id
                LEFT JOIN
            usaschool.games GAM ON RES.game_id = GAM.id
                LEFT JOIN
            usaschool.game_options GOP ON RES.game_option_id = GOP.id
                LEFT JOIN 
            usaschool.game_groups GRO ON GAM.game_group_id = GRO.id
            WHERE  CAST(SES.created_at AS DATE) >=  InitialDate AND CAST(SES.created_at AS DATE) <= EndDate
                AND  STU.group_id =  GroupQuery

            ) AS A 
            GROUP BY 
				date_,
				time_,
				student_id,
				student_name,
                code
        ); 
        SELECT * FROM GameResults;
        END IF;
	IF TypeReporQuery =  2 THEN 
                 
        DROP TABLE IF EXISTS GameResults;
        CREATE TEMPORARY TABLE IF NOT EXISTS  GameResults (

        SELECT 
            STU.first_name AS student_name,
            RES.id,
            GRU.teacher_id,
            STU.group_id,
            SES.student_id,
			STU.code,
            RES.game_id,
            RES.game_option_id,
            CAST(SES.created_at AS DATE) date_,
			CAST(SES.created_at AS TIME(0)) time_,
            REPLACE(GAM.game_name,' ','_') game_name,
            GOP.game_option_name,
            GRO.game_group_name,
            CASE WHEN GOP.game_option_name = 'TRUE' THEN 1 ELSE 0 END AS correct_answer,
            CASE WHEN GOP.game_option_name = 'FALSE' THEN 1 ELSE 0 END AS incorrect_answer,
            CASE WHEN GOP.game_option_name = 'NULL' THEN 1 ELSE 0 END AS unknown_answer,
            1 AS Resp
        
        FROM
            usaschool.game_results AS RES
                LEFT JOIN 
            usaschool.session_games AS SES ON RES.session_game_id = SES.id
                    LEFT JOIN
            usaschool.students AS STU ON SES.student_id = STU.id
                LEFT JOIN 
            usaschool.groups AS GRU ON STU.group_id = GRU.id
                LEFT JOIN
            usaschool.games GAM ON RES.game_id = GAM.id
                LEFT JOIN
            usaschool.game_options GOP ON RES.game_option_id = GOP.id
                LEFT JOIN 
            usaschool.game_groups GRO ON GAM.game_group_id = GRO.id
            WHERE  CAST(SES.created_at AS DATE) >=  InitialDate AND CAST(SES.created_at AS DATE) <= EndDate
                AND  STU.group_id =  GroupQuery
                AND GRO.id = ReporQuery
		
        );
        
        SET SESSION group_concat_max_len=1000000000000;
        SET @sql = NULL;
        SELECT
          GROUP_CONCAT( 
            CONCAT(
              'MAX(IF(SAB.game_name = ''',
              game_name,
              ''', SAB.game_option_name, NULL)) AS ',
              game_name
            )
          ) INTO @sql
          FROM GameResults;
          SET @sql = CONCAT('SELECT
							date_
                            ,time_
                            ,student_name
                            ,code
                            ,ROUND(((SUM(correct_answer)/SUM(Resp))*100),0) Total, ', @sql, ' 
                            FROM GameResults SAB
                            GROUP BY 	date_,
										time_,
										student_id,
										student_name,
                                        code
                            ORDER BY SAB.student_name ASC');
        
        PREPARE stmt FROM @sql;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;   
                
         END IF;
                END
    ";

    DB::unprepared("DROP PROCEDURE IF EXISTS GetAllGeneralResults");
    DB::unprepared($procedure);
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
