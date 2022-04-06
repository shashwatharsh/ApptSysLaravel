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
  <h2>Edit Appointments</h2>
             <div class="row">
               <div class="col-sm-4">
                 <form action="/category-update/{{$category->id}}" method="POST">
                   @csrf
                   @method('put')
                 <label for="name">Name</label>
                 <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                 <!-- <label for="email">Email</label>
                 <input type="text" name="email" id="email" class="form-control"> -->
                 <label for="email">Email</label>
                 <input type="email" name="email" id="email" class="form-control" value="{{ $category->email }}">
                 <label for="number">Number</label>
                 <input type="tel" name="number" id="number" class="form-control" value="{{ $category->number }}">
                 <label for="Reason">Reason</label>
                 <input type="text" name="Reason" id="Reason" class="form-control" value="{{ $category->Reason }}">
                 <label for="Date">Date</label>
                 <input type="datetime-local" name="date" id="date" class="form-control">
                 <label for="status">Status  :</label>
                 <select name="status" id="status" value="{{ $category->status}}">
                   <option value="In list">In list</option>
                   <option value="Done">Done</option>
                   <option value="Pending">Pending</option>
                   <option value="Pending">Cancelled</option>
                 </select>
                 <!-- <br> -->
                 
                 <button class="btn btn-info mt-4" type="submit">Update</button>
                 </form>
               </div>
             </div>
  
</div>
<!-- Script for Adding datetime value we are adding T and changing the seconds to 00 -->
<script>
  let c = '{{ $category->date}}';
  console.log(c);
  let c1 = c.split(" ")[0];
  let c2 = c.split(" ")[1];
  console.log(c1);
  console.log(c2);
  let c3 = c2.split(":")[0] +":"+ c2.split(":")[1]+":00";
  console.log(c3)
  let cv = c1+"T"+c3;
  document.getElementById("date").value = cv;

</script>
</body>
</html>
