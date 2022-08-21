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
        CREATE  PROCEDURE GetAllGamesResults(IN DateQuery DATE,IN GroupQuery INT, IN ReporQuery INT)
        BEGIN 
        
        DROP TABLE IF EXISTS GameResults;
        CREATE TEMPORARY TABLE IF NOT EXISTS  GameResults (
            SELECT 	A.*,
                    B.Q,
                    B.PROM
            FROM 
            (
        SELECT 
            CONCAT(STU.first_name, ' ', STU.last_name) AS student_name,
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
            CASE WHEN GOP.game_option_name = 'NULL' THEN 1 ELSE 0 END AS unknown_answer
        
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
            ) AS A 
            
            LEFT JOIN (
            SELECT 
            DISTINCT
            STU.group_id,
            SES.student_id,
            SUM(CASE WHEN game_option_name = 'TRUE' THEN 1 ELSE 0 END) OVER (partition by SES.student_id) AS Q,
            SUM(CASE WHEN game_option_name = 'TRUE'  THEN 1 ELSE 0 END) OVER (partition by SES.student_id)/(SELECT count(*) FROM usaschool.games where game_group_id = ReporQuery) AS PROM
        FROM
            usaschool.game_results AS RES
            LEFT JOIN 
                usaschool.session_games AS SES ON RES.session_game_id = SES.id
            LEFT JOIN 
                usaschool.students AS STU ON SES.student_id = STU.id
            LEFT JOIN
                usaschool.game_options GOP ON RES.game_option_id = GOP.id
            LEFT JOIN
                usaschool.games GAM ON RES.game_id = GAM.id
            LEFT JOIN 
                usaschool.game_groups GRO ON GAM.game_group_id = GRO.id
            WHERE CAST(RES.created_at AS DATE) =  DateQuery
                AND  STU.group_id =  GroupQuery
                AND GRO.id = ReporQuery
            ) AS B
            ON A.student_id = B.student_id
        );
        SET @sql = NULL;
        SELECT
          GROUP_CONCAT(DISTINCT
            CONCAT(
              'MAX(IF(SAB.game_name = ''',
              game_name,
              ''', SAB.game_option_name, NULL)) AS ',
              game_name
            )
          ) INTO @sql
          FROM GameResults;
          SET @sql = CONCAT('SELECT SAB.student_id
                            , SAB.student_name
                            , AVG(PROM)  Total
                            , ', @sql, ' 
                           FROM GameResults SAB
                            GROUP BY SAB.student_id,
                                        SAB.student_name
                            ORDER BY SAB.student_id ASC');
        
        PREPARE stmt FROM @sql;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;      
                END;
        
    ";

    DB::unprepared("DROP PROCEDURE IF EXISTS GetAllGamesResults");
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
