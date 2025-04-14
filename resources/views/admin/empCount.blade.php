@extends('layouts/dashboard')
@section('content')
<style>
 .flex-container {
    display: flex;
}

.flex-child {
    flex: 1;
    border: 2px solid yellow;
    height:200px;
}  

.flex-child:first-child {
    margin-right: 20px;
} 
.green{
    background-color:green
}
.blue{
    background-color:blue
}
</style>

<div class="flex-container">

  <div class="flex-child green">
    <div style="color:white;font-size:30px">Total number of Employees: {{$count['user']}}</div>
  </div>
  
  <div class="flex-child blue">
    <div style="color:white;font-size:30px">Total number of Skills:{{$count['skills']}}</div>
  </div>
  
</div>
@endsection