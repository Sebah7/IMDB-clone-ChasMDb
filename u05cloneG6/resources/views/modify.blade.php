<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Modify</title>
</head>

<body>
    <h2>Modify functions only for Admin

        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Movie title:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <button type="submit">
                    Add Movie
                </button>
            </div>
        </form>
</body>

</html>