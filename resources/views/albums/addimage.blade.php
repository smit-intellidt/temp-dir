<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Laravel PHP Framework</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">
        @if($errors->any())
            <div class="alert alert-block alert-error fade in" id="error-block">
                <?php
                $messages = $errors->all('<li>:message</li>');
                ?>
                <button type="button" class="close" data-dismiss="alert">×</button>

                <h4>Warning!</h4>
                <ul>
                    @foreach($messages as $message)
                        {{$message}}
                    @endforeach

                </ul>
            </div>
        @endif
        <form name="addimagetoalbum" method="POST" action="{{URL::route('add_image_to_album')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album_id" value="{{$album->id}}" />
            <fieldset>
                <legend>Add an Image to {{$album->name}}</legend>
                <div class="form-group">
                    <label for="description">Image Description</label>
                    <textarea name="description" type="text"class="form-control" placeholder="Image description"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Select an Image</label>
                    <input type="file" name="image" class="form-control">
{{--                    {{Form::file('image')}}--}}
                </div>
                <button type="submit" class="btn btn-default">Add Image!</button>
            </fieldset>
        </form>
    </div>
</div> <!-- /container -->
</body>
</html>