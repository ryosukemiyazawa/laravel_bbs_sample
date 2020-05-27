@extends('layout.common')

@section('content')
<?php
$items = \App\EntryItem::all();
echo "COUNT=" . count($items);
echo "<ul>";
foreach($items as $item){
	echo "<li>";
	echo $item->title . "<br />" . $item->body;
	echo "</li>";
}
echo "</ul>";
?>

@include('part.bbs_form')

@endsection