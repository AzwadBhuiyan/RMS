<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class higherAuthorityController extends Controller
{
    //
    public function home()
    {
        /*
        $sLass = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM spring_2022 WHERE SCHOOL_TITLE='SLASS'"));

        $sLass = $sLass[0]->capacity;

        $sels = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM spring_2022 WHERE SCHOOL_TITLE='SELS'"));

        $sels = $sels[0]->capacity;

        $sets = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM spring_2022 WHERE SCHOOL_TITLE='SETS'"));

        $sets = $sets[0]->capacity;

        */
        // dd($sLass[0]->capacity);
        // return view('higherAuthority.home', ['sLass' => $sLass, 'sels' => $sels, 'sets' => $sets]);
        return view('higherAuthority.home', ['sLass' => 12, 'sels' => 12, 'sets' => 12]);
    }


    public function showDifference(Request $req)
    {
        // $test = "spring_2022";
        // dd($req);


        $tableCheck1 = $req->sem1 . $req->year1;
        $tableCheck2 = $req->sem2 . $req->year2;

        if (!Schema::hasTable($tableCheck1) || !Schema::hasTable($tableCheck2)) {
            // $isTableFound = false;
            return redirect()->back()->withErrors(['exist' => 'Email already exists!']);
        }

        $capacity_1 = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM `$req->sem1$req->year1` WHERE SCHOOL_TITLE='SLASS'"));
        $capacity_1 = $capacity_1[0]->capacity;

        $enrolled_1 = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$req->sem1$req->year1` WHERE SCHOOL_TITLE='SLASS'"));
        $enrolled_1 = $enrolled_1[0]->enrolled;


        $capacity_2 = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM `$req->sem2$req->year2` WHERE SCHOOL_TITLE='SLASS'"));
        $capacity_2 = $capacity_2[0]->capacity;

        $enrolled_2 = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$req->sem2$req->year2` WHERE SCHOOL_TITLE='SLASS'"));
        $enrolled_2 = $enrolled_2[0]->enrolled;
        // dd($enrolled_2);

        // $firstDifference = intval($capacity_1)  - intval($enrolled_1);
        $firstDifference = $capacity_1 - $enrolled_1;
        $secondDifference = $capacity_2 - $enrolled_2;
        // $secondDifference = intval($capacity_2)  - intval($enrolled_2);

        $semName1 = str_replace("_", " ", $tableCheck1);
        $semName2 = str_replace("_", " ", $tableCheck2);

        return view('higherAuthority.graphs.semester_compare', [
            'semName1' => $semName1, 'semName2' => $semName2,
            'firstDifference' => $firstDifference, 'secondDifference' => $secondDifference
        ]);
    }


    public function functional_requirements_1(Request $req)
    {
        $tableCheck = $req->sem . $req->year;


        // dd($req->year - 1);

        //Please change the above querry for revenue table instead of tally sheet
        /*
        $enrolled_slass = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$tableCheck` WHERE SCHOOL_TITLE='SLASS'"));
        $enrolled_slass = $enrolled_slass[0]->enrolled;

        $c_hour_slass = DB::select(DB::raw("SELECT SUM(`CREDIT_HOUR`) as c_hour FROM `$tableCheck` WHERE SCHOOL_TITLE='SLASS'"));
        $c_hour_slass = $c_hour_slass[0]->c_hour;

        $enrolled_SETS = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$tableCheck` WHERE SCHOOL_TITLE='SETS'"));
        $enrolled_SETS = $enrolled_SETS[0]->enrolled;

        $c_hour_SETS = DB::select(DB::raw("SELECT SUM(`CREDIT_HOUR`) as c_hour FROM `$tableCheck` WHERE SCHOOL_TITLE='SETS'"));
        $c_hour_SETS = $c_hour_SETS[0]->c_hour;

        $enrolled_SBE = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$tableCheck` WHERE SCHOOL_TITLE='SBE'"));
        $enrolled_SBE = $enrolled_SBE[0]->enrolled;

        $c_hour_SBE = DB::select(DB::raw("SELECT SUM(`CREDIT_HOUR`) as c_hour FROM `$tableCheck` WHERE SCHOOL_TITLE='SBE'"));
        $c_hour_SBE = $c_hour_SBE[0]->c_hour;

        $enrolled_SELS = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$tableCheck` WHERE SCHOOL_TITLE='SELS'"));
        $enrolled_SELS = $enrolled_SELS[0]->enrolled;

        $c_hour_SELS = DB::select(DB::raw("SELECT SUM(`CREDIT_HOUR`) as c_hour FROM `$tableCheck` WHERE SCHOOL_TITLE='SELS'"));
        $c_hour_SELS = $c_hour_SELS[0]->c_hour;

        $enrolled_SPPH = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$tableCheck` WHERE SCHOOL_TITLE='SPPH'"));
        $enrolled_SPPH = $enrolled_SPPH[0]->enrolled;

        $c_hour_SPPH = DB::select(DB::raw("SELECT SUM(`CREDIT_HOUR`) as c_hour FROM `$tableCheck` WHERE SCHOOL_TITLE='SPPH'"));
        $c_hour_SPPH = $c_hour_SPPH[0]->c_hour;
*/

        //Change in revenue to be pending because of file usage confusion

        $year2 = $req->year - 1;

        $total_credits = DB::select(DB::raw("SELECT SUM(`Crs`) as totalCredits FROM `revenue` WHERE Semester='$req->sem' AND Year='$req->year'"));
        $total_credits = $total_credits[0]->totalCredits;

        $total_credits2 = DB::select(DB::raw("SELECT SUM(`Crs`) as totalCredits FROM `revenue` WHERE Semester='$req->sem' AND Year='$year2'"));
        $total_credits2 = $total_credits2[0]->totalCredits;


        $total_students = DB::select(DB::raw("SELECT SUM(`stuNo`) as totalStudents FROM `revenue` WHERE Semester='$req->sem' AND Year=$req->year"));
        $total_students = $total_students[0]->totalStudents;

        $total_students2 = DB::select(DB::raw("SELECT SUM(`stuNo`) as totalStudents FROM `revenue` WHERE Semester='$req->sem' AND Year=$year2"));
        $total_students2 = $total_students2[0]->totalStudents;

        dd($total_credits, $total_credits2, (int)$total_students, (int)$total_students2);
    }

    public function functional_requirements_2(Request $req)
    {
        //
        $sets = array();
        $slass = array();
        $sbe = array();
        $sels = array();
        $spph = array();

        for ($i = 1; $i < $req->year3; $i++) {

            $count_SETS = DB::select(DB::raw("SELECT COUNT(`SECTION`) as totalCount FROM `$req->sem3` WHERE SCHOOL_TITLE='SETS' AND ENROLLED=$i"));
            $count_SETS = $count_SETS[0]->totalCount;

            $count_SLASS = DB::select(DB::raw("SELECT COUNT(`SECTION`) as totalCount FROM `$req->sem3` WHERE SCHOOL_TITLE='SLASS' AND ENROLLED=$i"));
            $count_SLASS = $count_SLASS[0]->totalCount;

            $count_SBE = DB::select(DB::raw("SELECT COUNT(`SECTION`) as totalCount FROM `$req->sem3` WHERE SCHOOL_TITLE='SBE' AND ENROLLED=$i"));
            $count_SBE = $count_SBE[0]->totalCount;

            $count_SELS = DB::select(DB::raw("SELECT COUNT(`SECTION`) as totalCount FROM `$req->sem3` WHERE SCHOOL_TITLE='SELS' AND ENROLLED=$i"));
            $count_SELS = $count_SELS[0]->totalCount;

            $count_SPPH = DB::select(DB::raw("SELECT COUNT(`SECTION`) as totalCount FROM `$req->sem3` WHERE SCHOOL_TITLE='SPPH' AND ENROLLED=$i"));
            $count_SPPH = $count_SPPH[0]->totalCount;



            array_push($sets, $count_SETS);
            array_push($slass, $count_SLASS);
            array_push($sbe, $count_SBE);
            array_push($sels, $count_SELS);
            array_push($spph, $count_SPPH);

            // echo $count_SETS .":::";
            // print_r($sets);
        }
        // dd($spph);
    }

    public function functional_requirements_3(Request $req)
    {
        $tableCheck1 = $req->sem3 . $req->year3;
        $semName1 = str_replace("_", " ", $tableCheck1);

        if (!Schema::hasTable($tableCheck1)) {
            // $isTableFound = false;
            return redirect()->back()->withErrors(['exist' => 'Email already exists!']);
        }


        //Enrolled section wise
        $enrolled_sets = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SETS'"));
        $enrolled_sets = $enrolled_sets[0]->enrolled;

        $enrolled_slass = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SLASS'"));
        $enrolled_slass = $enrolled_slass[0]->enrolled;

        $enrolled_sbe = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SBE'"));
        $enrolled_sbe = $enrolled_sbe[0]->enrolled;

        $enrolled_sels = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SELS'"));
        $enrolled_sels = $enrolled_sels[0]->enrolled;

        $enrolled_spph = DB::select(DB::raw("SELECT SUM(`ENROLLED`) as enrolled FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SPPH'"));
        $enrolled_spph = $enrolled_spph[0]->enrolled;



        //Count section wise
        $count_sets = DB::select(DB::raw("SELECT COUNT(`SECTION`) as counts FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SETS'"));
        $count_sets = $count_sets[0]->counts;

        $count_slass = DB::select(DB::raw("SELECT COUNT(`SECTION`) as counts FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SLASS'"));
        $count_slass = $count_slass[0]->counts;

        $count_sbe = DB::select(DB::raw("SELECT COUNT(`SECTION`) as counts FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SBE'"));
        $count_sbe = $count_sbe[0]->counts;

        $count_sels = DB::select(DB::raw("SELECT COUNT(`SECTION`) as counts FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SELS'"));
        $count_sels = $count_sels[0]->counts;

        $count_spph = DB::select(DB::raw("SELECT COUNT(`SECTION`) as counts FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SPPH'"));
        $count_spph = $count_spph[0]->counts;


        // dd($count_slass);
        //Average enrolled, section wise
        $average_enrolled_sets = $enrolled_sets / $count_sets;
        $average_enrolled_slass = $enrolled_slass / $count_slass;
        $average_enrolled_sbe = $enrolled_sbe / $count_sbe;
        $average_enrolled_sels = $enrolled_sels / $count_sels;
        $average_enrolled_spph = $enrolled_spph / $count_spph;



        //Sum capacity, section wise
        $sum_capacity_sets = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SETS'"));
        $sum_capacity_sets = $sum_capacity_sets[0]->capacity;

        $sum_capacity_slass = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SLASS'"));
        $sum_capacity_slass = $sum_capacity_slass[0]->capacity;

        $sum_capacity_sbe = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SBE'"));
        $sum_capacity_sbe = $sum_capacity_sbe[0]->capacity;

        $sum_capacity_sels = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SELS'"));
        $sum_capacity_sels = $sum_capacity_sels[0]->capacity;

        $sum_capacity_spph = DB::select(DB::raw("SELECT SUM(`CAPACITY`) as capacity FROM `$req->sem3$req->year3` WHERE SCHOOL_TITLE='SPPH'"));
        $sum_capacity_spph = $sum_capacity_spph[0]->capacity;


        //Average capacity, section wise
        $average_capacity_sets = $sum_capacity_sets / $count_sets;
        $average_capacity_slass = $sum_capacity_slass / $count_slass;
        $average_capacity_sbe = $sum_capacity_sbe / $count_sbe;
        $average_capacity_sels = $sum_capacity_sels / $count_sels;
        $average_capacity_spph = $sum_capacity_spph / $count_spph;


        //Percentage of unused resources
        $unsused_percentage_sets = (($average_capacity_sets - $average_enrolled_sets) * $average_capacity_sets) / 100;
        $unsused_percentage_slass = (($average_capacity_slass - $average_enrolled_slass) * $average_capacity_slass) / 100;
        $unsused_percentage_sbe = (($average_capacity_sbe - $average_enrolled_sbe) * $average_capacity_sbe) / 100;
        $unsused_percentage_sels = (($average_capacity_sels - $average_enrolled_sels) * $average_capacity_sels) / 100;
        $unsused_percentage_spph = (($average_capacity_spph - $average_enrolled_spph) * $average_capacity_spph) / 100;


        $total_avg_enrolled = $average_enrolled_sets + $average_enrolled_slass + $average_enrolled_sbe + $average_enrolled_sels + $average_enrolled_spph;
        $total_avg_capacity = $average_capacity_sets + $average_capacity_slass + $average_capacity_sbe + $average_capacity_sels + $average_capacity_spph;

        // dd(round($unsused_percentage_sets));
        // dd(number_format((float)$unsused_percentage_sets, 2, '.', ''));

        return view('higherAuthority.graphs.functional_requirements_3', [
            'sets' => $unsused_percentage_sets, 'slass' =>  $unsused_percentage_slass,
            'sbe' => $unsused_percentage_sbe, 'sels' => $unsused_percentage_sels, 'spph' => $unsused_percentage_spph
        ]);
    }

    public function functional_requirements_4(Request $req)
    {

        $section_sets = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE SCHOOL_TITLE='SETS' AND Semester='$req->sem' AND Year='$req->year' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_sets = $section_sets[0]->sectionCount;

        $section_CSE = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Dept='CSE' AND Semester='$req->sem' AND Year='$req->year' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_CSE = $section_CSE[0]->sectionCount;

        $section_EEE = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Dept='EEE' AND Semester='$req->sem' AND Year='$req->year' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_EEE = $section_EEE[0]->sectionCount;

        $section_PhySci = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Dept='PhySci' AND Semester='$req->sem' AND Year='$req->year' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_PhySci = $section_PhySci[0]->sectionCount;




        // dd($section_sets, $section_CSE, $section_EEE, $section_PhySci);



        $section_sets2 = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE SCHOOL_TITLE='SETS' AND Semester='$req->sem2' AND Year='$req->year2' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_sets2 = $section_sets2[0]->sectionCount;

        $section_CSE2 = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Dept='CSE' AND Semester='$req->sem2' AND Year='$req->year2' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_CSE2 = $section_CSE2[0]->sectionCount;

        $section_EEE2 = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Dept='EEE' AND Semester='$req->sem2' AND Year='$req->year2' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_EEE2 = $section_EEE2[0]->sectionCount;

        $section_PhySci2 = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Dept='PhySci' AND Semester='$req->sem2' AND Year='$req->year2' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_PhySci2 = $section_PhySci2[0]->sectionCount;

        dd($section_sets2, $section_CSE2, $section_EEE2, $section_PhySci2);

        //create double bar where semesters are on x-axis i.e. red and blue color

    }

    public function functional_requirements_5(Request $req)
    {
        $totalClassroom = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Semester='$req->sem' AND Year='$req->year' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $totalClassroom = $totalClassroom[0]->sectionCount;

        $totalClassroom7_1 = $totalClassroom / 14;
        $totalClassroom8_1 = $totalClassroom / 16;




        // dd($totalClassroom);

        $totalClassroom2 = DB::select(DB::raw("SELECT COUNT(`Sec`) as sectionCount FROM `revenue` 
        WHERE Semester='$req->sem2' AND Year='$req->year2' AND stuNo BETWEEN $req->classSize1 AND $req->classSize2"));
        $totalClassroom2 = $totalClassroom2[0]->sectionCount;

        $totalClassroom7_2 = $totalClassroom2 / 14;
        $totalClassroom8_2 = $totalClassroom2 / 16;

        // round($totalClassroom7_1, 2);
        dd(round($totalClassroom7_1, 2), $totalClassroom8_1, $totalClassroom7_2, $totalClassroom8_2,);

        //4 consecutive pie charts followed by a table ex: output previous semester, page: 2
    }
}
