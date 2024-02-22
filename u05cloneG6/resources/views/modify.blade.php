<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Modify</title>
</head>

<body>
    <h2>Modifies functions only for Admin</h2>
    
         <!-- Genre Store Controller to add a genre to db from admin in blade. -->

                  <!-- Function Store -->
                  <form action="{{ route('genres.store') }}" method="POST">
                    @csrf
                    <label for="name">Genre Name:</label>
                        <input type="text" name="name" id="name">
                        <button type="submit">
                            Add Genre
                        </button>
                </form>
</body>

</html>