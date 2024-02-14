<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Rak</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Rak</th>
    <th>Baris</th>
    <th>Slug</th>
    <th>Kategori</th>
  </tr>
  @php
      $no = 1;
  @endphp
  @foreach ($data as $index => $row)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->rak }}</td>
    <td>{{ $row->baris }}</td>
    <td>{{ $row->slug }}</td>
    <td>{{ $row->Kategori->nama}}</td>
  @endforeach
  </tr>
  
</table>

</body>
</html>


