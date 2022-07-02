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
        return view('higherAuthority.home');
    }

    public function functional_requirements_1(Request $req)
    {

        $y1 = $req->year - 1;
        $y2 = $req->year2 - 1;
        //for sem1
        $total_credits = DB::select(DB::raw("SELECT SUM(C.credit_Hour) as totalCredits
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_credits = $total_credits[0]->totalCredits;

        $total_credits2 = DB::select(DB::raw("SELECT SUM(C.credit_Hour) as totalCredits
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$y1' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_credits2 = $total_credits2[0]->totalCredits;


        $total_students = DB::select(DB::raw("SELECT SUM(S.enrolled)as totalStudents
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_students = $total_students[0]->totalStudents;

        $total_students2 = DB::select(DB::raw("SELECT SUM(S.enrolled) as totalStudents
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$y1' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_students2 = $total_students2[0]->totalStudents;

        $revenue1 = $total_students * $total_credits;
        $revenue2 = $total_students2 * $total_credits2;
        $revenuechange = (($revenue2 - $revenue1) / $revenue1) * 100;

        //for sem2
        $total_credits3 = DB::select(DB::raw("SELECT SUM(C.credit_Hour) as totalCredits
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$req->year2' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_credits3 = $total_credits3[0]->totalCredits;

        $total_credits4 = DB::select(DB::raw("SELECT SUM(C.credit_Hour) as totalCredits
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$y2' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_credits4 = $total_credits4[0]->totalCredits;


        $total_students3 = DB::select(DB::raw("SELECT SUM(S.enrolled)as totalStudents
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$req->year2' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_students3 = $total_students3[0]->totalStudents;

        $total_students4 = DB::select(DB::raw("SELECT SUM(S.enrolled) as totalStudents
        From SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$y2' AND S.course_ID= C.course_ID AND C.dept_Code = D.dept_code AND D.school_Title = '$req->selectedSchool'"));
        $total_students4 = $total_students4[0]->totalStudents;

        $revenue3 = $total_students3 * $total_credits3;
        $revenue4 = $total_students4 * $total_credits4;
        $revenuechange2 = (($revenue4 - $revenue3) / $revenue3) * 100;

        


        return view(
            'higherAuthority.graphs.functional_requirements_1',
            [
                'semester1' => $req->sem, 'year1' => $req->year,
                'semester2' => $req->sem2, 'year2' => $req->year2,
                'y1' => $req->year - 1, 'y2' => $req->year2 - 1,
                'revenue1' => $revenue1, 'revenue2' => $revenue2,
                'revenue3' => $revenue3, 'revenue4' => $revenue4,
                'school' => $req->selectedSchool, 'revenueChange' => round($revenuechange, 1),
                'revenueChange2' => round($revenuechange2, 1)
            ]
        );
    }

    public function functional_requirements_2(Request $req)
    {

        $sets = array();
        $slass = array();
        $sbe = array();
        $sels = array();
        
        $enrolled = array();

        for ($i = 1; $i < $req->givenNumber; $i++) {


            $count_SETS = DB::select(DB::raw("SELECT COUNT(sectionNumber) as totalCount
            FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
            WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.school_Title= 'SETS' AND S.enrolled=$i"));
            $count_SETS = $count_SETS[0]->totalCount;

            array_push($sets, $count_SETS);


            $count_SLASS = DB::select(DB::raw("SELECT COUNT(sectionNumber) as totalCount 
            FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
            WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.school_Title= 'SLASS' AND S.enrolled=$i"));
            $count_SLASS = $count_SLASS[0]->totalCount;

            array_push($slass, $count_SLASS);

            $count_SBE = DB::select(DB::raw("SELECT COUNT(sectionNumber) as totalCount 
            FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
            WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.school_Title= 'SBE' AND S.enrolled=$i"));
            $count_SBE = $count_SBE[0]->totalCount;

            array_push($sbe, $count_SBE);


            $count_SELS = DB::select(DB::raw("SELECT COUNT(sectionNumber) as totalCount 
            FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
            WHERE S.semester='$req->sem' AND S.year='$req->year' AND C.dept_Code = D.dept_Code AND S.course_ID = C.course_ID  AND D.school_Title= 'SELS' AND S.enrolled=$i"));
            $count_SELS = $count_SELS[0]->totalCount;

            array_push($sels, $count_SELS);

            array_push($enrolled, $i);

        }

        

        $value['enrolled'] = $enrolled;
        $value['sets'] = $sets;
        $value['slass'] = $slass;
        $value['sbe'] = $sbe;
        $value['sels'] = $sels;

        return view('higherAuthority.graphs.functional_requirements_2', $value);
    }

    public function functional_requirements_3(Request $req)
    {

        //Enrolled section wise
        $enrolled_sets = DB::select(DB::raw("SELECT SUM(enrolled) as enrolled
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title ='SETS'"));
        $enrolled_sets = $enrolled_sets[0]->enrolled;

        $enrolled_slass = DB::select(DB::raw("SELECT SUM(enrolled) as enrolled
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title ='SLASS'"));
        $enrolled_slass = $enrolled_slass[0]->enrolled;

        $enrolled_sbe = DB::select(DB::raw("SELECT SUM(enrolled) as enrolled
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title ='SBE'"));
        $enrolled_sbe = $enrolled_sbe[0]->enrolled;

        $enrolled_sels = DB::select(DB::raw("SELECT SUM(enrolled) as enrolled
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title ='SELS'"));
        $enrolled_sels = $enrolled_sels[0]->enrolled;


        //Count section wise
        $count_sets = DB::select(DB::raw("SELECT count(CR.room_ID) as counts
        FROM CLASSROOM AS CR, SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SETS'"));
        $count_sets = $count_sets[0]->counts;

        $count_slass = DB::select(DB::raw("SELECT count(CR.room_ID) as counts
        FROM CLASSROOM AS CR, SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SLASS'"));
        $count_slass = $count_slass[0]->counts;

        $count_sbe = DB::select(DB::raw("SELECT count(CR.room_ID) as counts
        FROM CLASSROOM AS CR, SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SBE'"));
        $count_sbe = $count_sbe[0]->counts;

        $count_sels = DB::select(DB::raw("SELECT count(CR.room_ID) as counts
        FROM CLASSROOM AS CR, SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SELS'"));
        $count_sels = $count_sels[0]->counts;

        //Average enrolled, section wise
        $average_enrolled_sets = $enrolled_sets / $count_sets;
        $average_enrolled_slass = $enrolled_slass / $count_slass;
        $average_enrolled_sbe = $enrolled_sbe / $count_sbe;
        $average_enrolled_sels = $enrolled_sels / $count_sels;



        //Sum capacity, section wise
        $sum_capacity_sets = DB::select(DB::raw("SELECT SUM(room_size) as capacity
        FROM CLASSROOM AS CR, DEPARTMENT AS D, SECTION AS S, COURSE AS C
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SETS'"));
        $sum_capacity_sets = $sum_capacity_sets[0]->capacity;

        $sum_capacity_slass = DB::select(DB::raw("SELECT SUM(room_size) as capacity
        FROM CLASSROOM AS CR, DEPARTMENT AS D, SECTION AS S, COURSE AS C
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SLASS'"));
        $sum_capacity_slass = $sum_capacity_slass[0]->capacity;

        $sum_capacity_sbe = DB::select(DB::raw("SELECT SUM(room_size) as capacity
        FROM CLASSROOM AS CR, DEPARTMENT AS D, SECTION AS S, COURSE AS C
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SBE'"));
        $sum_capacity_sbe = $sum_capacity_sbe[0]->capacity;

        $sum_capacity_sels = DB::select(DB::raw("SELECT SUM(room_size) as capacity
        FROM CLASSROOM AS CR, DEPARTMENT AS D, SECTION AS S, COURSE AS C
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.room_ID=CR.room_ID AND S.course_ID=C.course_ID AND C.dept_Code=D.dept_Code AND D.school_Title = 'SELS'"));
        $sum_capacity_sels = $sum_capacity_sels[0]->capacity;

        //Average capacity, section wise
        $average_capacity_sets = $sum_capacity_sets / $count_sets;
        $average_capacity_slass = $sum_capacity_slass / $count_slass;
        $average_capacity_sbe = $sum_capacity_sbe / $count_sbe;
        $average_capacity_sels = $sum_capacity_sels / $count_sels;

        //Percentage of unused resources
        $unsused_percentage_sets = abs((($average_capacity_sets - $average_enrolled_sets) * $average_capacity_sets) / 100);
        $unsused_percentage_slass = abs((($average_capacity_slass - $average_enrolled_slass) * $average_capacity_slass) / 100);
        $unsused_percentage_sbe = abs((($average_capacity_sbe - $average_enrolled_sbe) * $average_capacity_sbe) / 100);
        $unsused_percentage_sels = abs((($average_capacity_sels - $average_enrolled_sels) * $average_capacity_sels) / 100);
        $unsused_percentage_university = abs($unsused_percentage_sets+$unsused_percentage_slass +$unsused_percentage_sbe+$unsused_percentage_sels);



        $percentage['sets'] = round($unsused_percentage_sets, 1);
        $percentage['slass'] = round($unsused_percentage_slass, 1);
        $percentage['sbe'] = round($unsused_percentage_sbe, 1);
        $percentage['sels'] = round($unsused_percentage_sels, 1);
        $percentage['totalUni'] = round($unsused_percentage_university, 1);
        $percentage['semester'] = $req->sem . " " . $req->year;

        return view('higherAuthority.graphs.functional_requirements_3', $percentage);

    }

    public function functional_requirements_4(Request $req)
    {
        //for Semester 1

        $section_sets = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.school_Title= 'SETS' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_sets = $section_sets[0]->sectionCount;

        $section_CSE = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.dept_code= 'CSE' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_CSE = $section_CSE[0]->sectionCount;

        $section_EEE = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.dept_code= 'EEE' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_EEE = $section_EEE[0]->sectionCount;

        $section_PhySci = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem' AND S.year='$req->year' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.dept_code= 'PhySci' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_PhySci = $section_PhySci[0]->sectionCount;

        //for Semester 2

        $section_sets2 = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$req->year2' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.school_Title = 'SETS' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_sets2 = $section_sets2[0]->sectionCount;

        $section_CSE2 = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$req->year2' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.dept_code= 'CSE' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_CSE2 = $section_CSE2[0]->sectionCount;

        $section_EEE2 = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$req->year2' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.dept_code= 'EEE' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_EEE2 = $section_EEE2[0]->sectionCount;

        $section_PhySci2 = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM SECTION AS S, COURSE AS C, DEPARTMENT AS D
        WHERE S.semester='$req->sem2' AND S.year='$req->year2' AND S.course_ID = C.course_ID AND C.dept_Code = D.dept_Code AND D.dept_code= 'PhySci' AND S.enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $section_PhySci2 = $section_PhySci2[0]->sectionCount;

        

        $value['sem'] = $req->sem;
        $value['year'] = $req->year;
        $value['sem2'] = $req->sem2;
        $value['year2'] = $req->year2;

        $value['sets'] = $section_sets;
        $value['CSE'] = $section_CSE;
        $value['EEE'] = $section_EEE;
        $value['PhySci'] = $section_PhySci;

        $value['sets2'] = $section_sets2;
        $value['CSE2'] = $section_CSE2;
        $value['EEE2'] = $section_EEE2;
        $value['PhySci2'] = $section_PhySci2;

        return view('higherAuthority.graphs.functional_requirements_4', $value);

    }

    public function functional_requirements_5(Request $req)
    {
        //for Semester1

        $totalClassroom = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM `SECTION` 
        WHERE semester='$req->sem' AND year='$req->year' AND enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $totalClassroom = $totalClassroom[0]->sectionCount;
       
        $totalClassroom7_1 = $totalClassroom / 14;
        $totalClassroom8_1 = $totalClassroom / 16;

        //for Semester2

        $totalClassroom2 = DB::select(DB::raw("SELECT COUNT(sectionNumber) as sectionCount
        FROM `SECTION` 
        WHERE semester='$req->sem2' AND year='$req->year2' AND enrolled BETWEEN $req->classSize1 AND $req->classSize2"));
        $totalClassroom2 = $totalClassroom2[0]->sectionCount;

        $totalClassroom7_2 = $totalClassroom2 / 14;
        $totalClassroom8_2 = $totalClassroom2 / 16;

         

       

        $value['totalClassroom7_1'] = $totalClassroom7_1;
        $value['totalClassroom8_1'] = $totalClassroom8_1;

        $value['totalClassroom2'] = $totalClassroom2;
        $value['totalClassroom7_2'] = $totalClassroom7_2;
        $value['totalClassroom8_2'] = $totalClassroom8_2;

        $value['section'] = $totalClassroom;
        $value['section2'] = $totalClassroom2;


        $value['semester1'] = $req->sem . " " . $req->year;
        $value['semester2'] = $req->sem2 . " " . $req->year2;

        $value['classSize'] = $req->classSize1 . "-" . $req->classSize2;

        return view('higherAuthority.graphs.functional_requirements_5', $value);
    }
}
