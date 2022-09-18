<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student monthly fee pdf</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }
    .container{
        width: 100%;
        margin: auto;
        background-color: gainsboro;
    }
    .container .row{
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        /*  */
    }
    .container .row .col-4{
        
        margin-top: 30px;
        
    }
    .container .row .col-4 img{
        width: 150px;
        height: 100px;
        
        
    }
    .container .row .col-4:first-child{
       
        margin-left: 50px;
        
    }
    .container .row .col-4:last-child{
       
       margin-right: 50px;
       
   }
    .container .row_1 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
    .container .row_2{
        justify-content: flex-end;
        padding-top: 20px;
        padding-right: 80px;
        padding-bottom: 30px;
    }
    table{
        width: 80%;
        margin: auto;
        border: 2px solid #000;
        border-collapse: collapse;
        
        
       
    }
    th,td{
        width: 50%;
        border: 2px solid #000;
        text-align: left;
        padding-left: 30px;
        padding: 3px;
    }
    
    
</style>
<body>
    <div class="container">
        <table style="width: 80%;padding-top: 50px; padding-bottom:2px;">
            <tr style="">
                <td style="width: 33%">
                    <img style="width: 100%;height:100px;" src="../public/upload/school-logo.jpg" alt="" srcset="">
                </td>
                <td style="width: 63%;padding: 30px;text-align:center;">
                    <h4 style="font-size: 25px; text-align:center; padding-bottom:5px;">Chatul high school</h4>
                    <h5 style="font-size: 15px; padding-bottom:4px;">Chatul,Boalmari,Faridpur</h5>
                    <p style="font-size: 15px">www.chatulhighschool</p>
                </td>
                <td style="width: 33%">
                   {{-- <img style="width: 100%;height:100px;" src="{{ url('public/upload/student_image/'.$AssingStudent->user->image)}}" alt=""></td>   --}}                            
                     <img style="width: 100%;height:100px;" src="../public/upload/empty-profile.png" alt="" srcset="">  
                </td>
            </tr>
        </table>


        <div class="row_1">
            <div class="text">
                <h4 style="font-size: 20px; text-align:center; padding-bottom:10px; ">Stusent monthly fee slip (student copy)</h4>
            </div>
        </div>
        <table>
            @php
                
                $orginalFee = $fee_category->amount;
                $discount = $AssingStudent->discount->discount;
                $totalFee = $discount/100*$orginalFee;
                $finalFee = (float)$orginalFee - (float)$totalFee;

            @endphp
           
            <tbody>
                
                <tr>
                    <td>Id No.</td>
                    <td>{{ $AssingStudent->user->id_no }}</td>
                </tr>
                <tr>
                    <td>Roll No.</td>
                    <td>{{ $AssingStudent->roll }}</td>
                </tr>
                <tr>
                    <td>Student name</td>
                    <td>{{ $AssingStudent->user->name }}</td>
                </tr>
                <tr>
                    <td>Father's name</td>
                    <td>{{ $AssingStudent->user->fat_name }}</td>
                </tr>
                <tr>
                    <td>Mother's Name</td>
                    <td>{{ $AssingStudent->user->mot_name }}</td>
                </tr>
                <tr>
                    <td>Session</td>
                    <td>{{ $AssingStudent->year->name }}</td>
                </tr>
                <tr>
                    <td>Class Name</td>
                    <td>{{ $AssingStudent->student_class->name }}</td>
                </tr>
                <tr>
                    <td>Exam fee</td>
                    <td>{{ $orginalFee .' tk' }}</td>
                </tr>
                <tr>
                    <td>Discount fee</td>
                    <td>{{ $AssingStudent->discount->discount .' %' }}</td>
                </tr>
                <tr>
                    <td>Total fee of {{ $exam }}</td>
                    <td>{{ $finalFee ." tk" }}</td>
                </tr>
                
            </tbody>
        </table>
        <i style="font-size: 10px;float:left; padding-left:80px; margin-top:3px;">Prnit Date : {{date("d M Y")}}</i>
        <div class="row_1 row_2">
            <div style="text-align: right">
                <p class="line"></p>
                <h4 style="text-decoration: overline">Princpal/Headmaster</h4>
            </div>
        </div>
        
        <hr>
        <table style="width: 80%;padding-top: 36px; padding-bottom:2px;">
            <tr style="">
                <td style="width: 33%">
                    <img style="width: 100%;height:100px;" src="../public/upload/school-logo.jpg" alt="" srcset="">
                </td>
                <td style="width: 63%;padding: 30px;text-align:center;">
                    <h4 style="font-size: 25px; text-align:center; padding-bottom:5px;">Chatul high school</h4>
                    <h5 style="font-size: 15px; padding-bottom:4px;">Chatul,Boalmari,Faridpur</h5>
                    <p style="font-size: 15px">www.chatulhighschool</p>
                </td>
                <td style="width: 33%">
                   {{-- <img style="width: 100%;height:100px;" src="{{ url('public/upload/student_image/'.$AssingStudent->user->image)}}" alt=""></td>   --}}                            
                     <img style="width: 100%;height:100px;" src="../public/upload/empty-profile.png" alt="" srcset="">  
                </td>
            </tr>
        </table>


        <div class="row_1">
            <div class="text">
                <h4 style="font-size: 20px; text-align:center; padding-bottom:10px;">Stusent monthly fee slip (office copy)</h4>
            </div>
        </div>
        <table>
            @php
                
                $orginalFee = $fee_category->amount;
                $discount = $AssingStudent->discount->discount;
                $totalFee = $discount/100*$orginalFee;
                $finalFee = (float)$orginalFee - (float)$totalFee;

            @endphp
           
            <tbody>
                
                <tr>
                    <td>Id No.</td>
                    <td>{{ $AssingStudent->user->id_no }}</td>
                </tr>
                <tr>
                    <td>Roll No.</td>
                    <td>{{ $AssingStudent->roll }}</td>
                </tr>
                <tr>
                    <td>Student name</td>
                    <td>{{ $AssingStudent->user->name }}</td>
                </tr>
                <tr>
                    <td>Father's name</td>
                    <td>{{ $AssingStudent->user->fat_name }}</td>
                </tr>
                <tr>
                    <td>Mother's Name</td>
                    <td>{{ $AssingStudent->user->mot_name }}</td>
                </tr>
                <tr>
                    <td>Session</td>
                    <td>{{ $AssingStudent->year->name }}</td>
                </tr>
                <tr>
                    <td>Class Name</td>
                    <td>{{ $AssingStudent->student_class->name }}</td>
                </tr>
                <tr>
                    <td>Exam fee</td>
                    <td>{{ $orginalFee .' tk' }}</td>
                </tr>
                <tr>
                    <td>Discount fee</td>
                    <td>{{ $AssingStudent->discount->discount .' %' }}</td>
                </tr>
                <tr>
                    <td>Total fee of {{ $exam }}</td>
                    <td>{{ $finalFee ." tk" }}</td>
                </tr>
                
            </tbody>
        </table>
        <i style="font-size: 10px;float:left; padding-left:80px; margin-top:3px;">Prnit Date : {{date("d M Y")}}</i>
        <div class="row_1 row_2">
            <div style="text-align: right">
                <p class="line"></p>
                <h4 style="text-decoration: overline">Princpal/Headmaster</h4>
            </div>
        </div>
    </div> 
</body>
</html>