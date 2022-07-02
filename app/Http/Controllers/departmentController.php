<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class departmentController extends Controller
{
    //
    public function home()
    {
        return view('department.home');
    }


    public function uploadCSVs(Request $req)
    {
        $name = $req->img->getClientOriginalName();
        $imageName = time() . '.' . $req->img->extension();
        // $req->img->move(public_path('csv'), $name);
        // dd($imageName);
        // $this->csvToArray();
    }


    public function enroll_section(Request $req)
    {
        //    dd($req);
        $start_time = $req->start_hour . ":" . $req->start_min . ":" . $req->start_meridiem;
        $end_time = $req->end_hour . ":" . $req->end_min . ":" . $req->end_meridiem;

        DB::select(DB::raw("INSERT INTO `section`(`year`, `semester`,`sectionNumber`, `course_ID`, `room_ID`, `enrolled`, `start_time`, `end_time`, `schedule`, `faculty_full_name`, `blocked`) VALUES
                         ('$req->year','$req->semester','$req->section', '$req->course_id','$req->room_id','$req->enrolled','$start_time','$end_time','$req->schedule','$req->faculty_full_name' , '-1')"));
        
        
        return redirect()->back()->withErrors(['successfull' => 'Section entry has been successfully enrolled!']);
    }

    public function uploadCSV(Request $req)
    {
        // dd($tableName);
        /*
        $filename = './csv/Tally_Sheet_For_Autumn_2020_4_Tally_Sheet_For_Autumn_2020_4.csv';
        $delimiter = ',';

        if (!file_exists($filename) || !is_readable($filename))
        return false;
        
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                $header = $row;
                else
                $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        */

        $name = $req->talySheet->getClientOriginalName();
        $req->talySheet->move(public_path('csv'), $name);

        $tableName = $req->semester . '_' . $req->year;


        $path = base_path() . "./public/csv/" . $name;

        if (file_exists($path)) {
            $file = new \SplFileObject($path);
            $file->setFlags(\SplFileObject::READ_CSV);

            if (Schema::hasTable($req->semester . '_' . $req->year) === false) {
                Schema::create($req->semester . '_' . $req->year, function (Blueprint $table) {
                    $table->string('SCHOOL_TITLE');
                    $table->string('COFFER_COURSE_ID');
                    $table->string('COFFERED_WITH');
                    $table->string('SECTION');
                    $table->string('CREDIT_HOUR');
                    $table->string('CAPACITY');
                    $table->string('ENROLLED');
                    $table->string('ROOM_ID');
                    $table->string('ROOM_CAPACITY');
                    $table->string('BLOCKED');
                    $table->string('COURSE_NAME');
                    $table->string('FACULTY_FULL_NAME');
                    $table->string('START_TIME');
                    $table->string('END_TIME');
                    $table->string('ST_MW');
                });



                foreach ($file as $key => $value) {
                    list(
                        $SCHOOL_TITLE, $COFFER_COURSE_ID, $COFFERED_WITH, $SECTION, $CREDIT_HOUR, $CAPACITY, $ENROLLED, $ROOM_ID,
                        $ROOM_CAPACITY, $BLOCKED, $COURSE_NAME, $FACULTY_FULL_NAME, $START_TIME, $END_TIME, $ST_MW
                    ) = $value;


                    DB::select(DB::raw(
                        "INSERT INTO `section`
                    (`SCHOOL_TITLE`, `COFFER_COURSE_ID`, `COFFERED_WITH`, `SECTION`, `CREDIT_HOUR`, `CAPACITY`, `ENROLLED`, `ROOM_ID`, `ROOM_CAPACITY`, `BLOCKED`,
                    `COURSE_NAME`, `FACULTY_FULL_NAME`, `START_TIME`, `END_TIME`, `ST_MW`)
                    VALUES
                    ('$SCHOOL_TITLE', '$COFFER_COURSE_ID', '$COFFERED_WITH', '$SECTION', '$CREDIT_HOUR', '$CAPACITY', '$ENROLLED', '$ROOM_ID',
                    '$ROOM_CAPACITY', '$BLOCKED', '$COURSE_NAME', '$FACULTY_FULL_NAME', '$START_TIME', '$END_TIME', '$ST_MW')"
                    ));
                }
            }
        }
    }
}
