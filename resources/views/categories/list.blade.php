<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Appointment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Appointments <a class="btn btn-info" href="/category-create">Add Appointment</a></h2>
             
  @if(session()->has('success'))
    <div class="alert alert-info" role="alert">
      <strong>{{session()->get('success')}}</strong>
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Reason</th>
        <th>Date - Time</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
     
      <tr>
          <!-- <td>1</td>
          <td>PRabu</td>
          <td>prabhu@gmail.com</td>
          <td>923456789</td>
          <td>Birthday</td> -->
          <td>{{ $loop->index+1}}</td>
          <td>{{ $category->name}}</td>
          <td>{{ $category->email}}</td>
          <td>{{ $category->number}}</td>
          <td>{{ $category->Reason}}</td>
          <td>{{ $category->date}}</td>
          <td>{{ $category->status }}</td>
          <td>
            <a href="/category-edit/{{$category->id}}" class="btn btn-sm btn-info">Edit</a>
            <!-- <a href="/category-delete/{{$category->id}}" class="btn btn-sm btn-danger">Delete</a> -->

            <form action="/category-delete/{{$category->id}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
          
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- <div class="d-flex justify-content-center"> -->
    
    {!!$categories->links('pagination::bootstrap-5')!!}
  <!-- </div> -->
</div>

</body>
</html>
