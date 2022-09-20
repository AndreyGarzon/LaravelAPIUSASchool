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
        CREATE  PROCEDURE GetAllGeneralResults(IN DateQuery DATE,IN GroupQuery INT, IN ReporQuery INT, IN TypeReporQuery INT)
        BEGIN 

        IF TypeReporQuery =  1
        THEN
        DROP TABLE IF EXISTS GameResults;
        CREATE TEMPORARY TABLE IF NOT EXISTS  GameResults (
            SELECT 	
            student_name,
			(SUM(IF(game_group_id = 1, correct_answer, null))/ SUM(if(game_group_id = 1, total_answer, null)))   AS Letter_Recognition,
			(SUM(IF(game_group_id = 2, correct_answer, null))/ SUM(if(game_group_id = 2, total_answer, null)))   AS Sound_Recognition,
            (SUM(IF(game_group_id = 3, correct_answer, null))/ SUM(if(game_group_id = 3, total_answer, null)))   AS Pre_K_Dolch_Sight_Words,
            (SUM(IF(game_group_id = 4, correct_answer, null))/ SUM(if(game_group_id = 4, total_answer, null)))   AS Kindergarten_Dolch_Sight_Words,
            (SUM(IF(game_group_id = 5, correct_answer, null))/ SUM(if(game_group_id = 5, total_answer, null)))   AS First_Grade_Dolch_Sight_Words,
            (SUM(IF(game_group_id = 6, correct_answer, null))/ SUM(if(game_group_id = 6, total_answer, null)))   AS Second_Grade_Dolch_Sight_Words,
            (SUM(IF(game_group_id = 7, correct_answer, null))/ SUM(if(game_group_id = 7, total_answer, null)))   AS Third_Grade_Dolch_Sight_Words,
            (SUM(IF(game_group_id = 8, correct_answer, null))/ SUM(if(game_group_id = 8, total_answer, null)))   AS Noun_Dolch_Sight_Words
            
            
			
            FROM 
	(
        SELECT 
			STU.first_name AS student_name,
            RES.id,
            GRU.teacher_id,
            STU.group_id,
            SES.student_id,
            RES.game_id,
            RES.game_option_id,
            CAST(SES.created_at AS DATE) date_result,
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
            WHERE  CAST(SES.created_at AS DATE) =  DateQuery
                AND  STU.group_id =  GroupQuery

            ) AS A 
            GROUP BY 
           student_id,
            student_name
        ); 
        
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
            RES.game_id,
            RES.game_option_id,
            CAST(SES.created_at AS DATE) date_result,
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
            WHERE  CAST(SES.created_at AS DATE) =  DateQuery
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
                            SAB.student_name
                            ,SUM(correct_answer)/SUM(Resp) Total, ', @sql, ' 
                            FROM GameResults SAB
                            GROUP BY 	SAB.student_id,
                                    SAB.student_name
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
