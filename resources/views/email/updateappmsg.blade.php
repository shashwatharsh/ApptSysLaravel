<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <style>
        .cont{
            text-align: center;
            border: 5px solid #324051;
        }
        .cont{
            background-color: #99e7df;
        }
        .title {
            margin: 8vw;
        }
        .basef{
            background-color: #d2e799;
            padding: 18px;
        }
    </style>
</head>
<body>
    <div class="cont">
        
    <h1 class="title">Your Appointement has been Updated </h1>
    <h3>Status : {{$mailData->status}}</h3>
    <h3>Name: {{$mailData->name}}</h3>
    <h3>Date and time : {{$mailData->date}}</h3>
    <h3>Reason : {{$mailData->Reason}}</h3>
    <h3>Number : {{$mailData->number}}</h3>

    <h6 class="basef">For any querry contact +917322947053 (Shashwat Harsh)</h6>
    </div>
</body>
</html>