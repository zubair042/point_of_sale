@extends('layouts.app')

@section('content')

<?php //echo "<pre>"; print_r($user); exit; ?>

<style type="text/css">
	h1 {
		padding: 0;
		margin: 0 8px;
		font-size: 24px;
		color: #2679b5;
	}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card" style="padding: 12px;">
            <div class="row">
                <div class="col-md-12">
                    <h1>Profile</h1>
                </div>
            </div>
            <div class="row">
				<div class="col-md-12">
					<hr allign="left">
				</div>
			</div>
            <div class="row">
                <div class="col-md-2 offset-md-3">
                        <strong>User ID</strong>
                </div>
                <div class="col-md-3">
                    <p>{{$user->id}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-3">
                        <strong>Email</strong>
                </div>
                <div class="col-md-3">
                    <p>{{$user->email}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-3">
                        <strong>First Name:</strong>
                </div>
                <div class="col-md-3">
                    <p>{{$user->first_name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-3">
                        <strong>Last Name:</strong>
                </div>
                <div class="col-md-3">
                    <p>{{$user->last_name}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection