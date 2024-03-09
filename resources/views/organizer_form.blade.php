<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become an Organizer</title>
    
</head>
<body>

    <h2>Become an Organizer</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    <form action="{{ route('organizer_form.store') }}" method="POST">
        @csrf

        <label for="establishment_id">Select Establishment:</label>
        <select name="establishment_id" id="establishment_id">
            @foreach($establishments as $establishment)
                <option  value="{{ $establishment->id }}">{{ $establishment->name }}</option>
            @endforeach
        </select>

        <label for="confirmation_code">Confirmation Code:</label>
        <input type="text" name="confirmation_code" id="confirmation_code" required>

        

        <button type="submit">Submit</button>
    </form>

</body>
</html>
