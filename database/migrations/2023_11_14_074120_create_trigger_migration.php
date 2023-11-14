<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
	public function up()
	{
		$sql = "
			CREATE TRIGGER article_udid_trigger
			BEFORE INSERT ON articles
			FOR EACH ROW
			BEGIN
				SET NEW.udid = (
					SELECT
						IFNULL(maxid, 0) + 1 + DATE_FORMAT(now(), '%y%m%d')
					FROM (
						SELECT MAX(id) AS maxid FROM articles
					) as tmp
				);
			END
		";

		DB::unprepared($sql);
		// DB::statement($sql);
	}

	public function down()
	{
		$sql = "DROP TRIGGER IF EXISTS article_udid_trigger";

		DB::unprepared($sql);
	}

};