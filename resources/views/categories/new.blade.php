<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add appointment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>New Appointments</h2>
             <div class="row">
               <div class="col-sm-4">
                 <form action="/category-store" method="POST">
                   @csrf
                 <label for="name">Name</label>
                 <input type="text" name="name" id="name" class="form-control">
                 <!-- <label for="email">Email</label>
                 <input type="text" name="email" id="email" class="form-control"> -->
                 <label for="email">Email</label>
                 <input type="email" name="email" id="email" class="form-control">
                 <label for="number">Number</label>
                 <input type="tel" name="number" id="number" class="form-control">
                 <label for="Reason">Reason</label>
                 <input type="text" name="Reason" id="Reason" class="form-control">
                 <label for="date">Date</label>
                 <input type="datetime-local" name="date" id="date" class="form-control">
                 
                 <button class="btn btn-info mt-4" type="submit">Create</button>
                 </form>
               </div>
             </div>
  
</div>

</body>
</html>
