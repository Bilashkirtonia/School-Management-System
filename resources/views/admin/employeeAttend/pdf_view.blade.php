<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teachers deatails pdf</title>
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
        
        margin-top: 60px;
        
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
        padding-top: 50px;
        padding-right: 80px;
        padding-bottom: 100px;
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
        padding: 10px;
    }
    /* .line{
        width: 20px;
        height:2px;
        text-align: right;
        background:black;
        padding-bottom:1px;
        
    } */
    
</style>
<body>
    <div class="container">
        <table style="width: 80%;padding-top: 150px; padding-bottom:10px;">
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
                <h4 style="font-size: 25px; text-align:center; padding-bottom:10px;">Stusent Registation Card</h4>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th >Student name</th>
                    <th>{{ $AssingStudent->name }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Father's name</td>
                    <td>{{ $AssingStudent->fat_name }}</td>
                </tr>
                <tr>
                    <td>Mother's Name</td>
                    <td>{{ $AssingStudent->mot_name }}</td>
                </tr>
                
                <tr>
                    <td>Id No.</td>
                    <td>{{ $AssingStudent->id_no }}</td>
                </tr>
                
                <tr>
                    <td>Mobile Number</td>
                    <td>{{ $AssingStudent->mobile }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $AssingStudent->address }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $AssingStudent->gender }}</td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td>{{ $AssingStudent->religion }}</td>
                </tr>
                  <tr>
                    <td>Designation</td>
                    <td>{{ $AssingStudent->designation->name }}</td>
                </tr>
                <tr>
                    <td>Joinig date</td>
                    <td>{{ $AssingStudent->join_date }}</td>
                </tr>
                <tr>
                    <td>Salary</td>
                    <td>{{ $AssingStudent->salary }}</td>
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