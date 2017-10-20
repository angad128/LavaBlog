
@extends('main')

@section('title')
    | Contact
@endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <h2>Contact Me</h2>
                <hr>
                <form>
                    <div class="form-group">
                        <label name="email">Email: </label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label name="email">Subject: </label>
                        <input class="form-control" type="text" name="subject" id="subject">
                    </div>
                    <div class="form-group">
                        <label name="email">Message: </label>
                        <textarea class="form-control" type="text" name="message">Type your Message here!</textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="Message Send">
                </form>
            </div>
        </div>  
@endsection
    