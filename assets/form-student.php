<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" 
                name="first_name" 
                placeholder="Křestní jméno" 
                value="<?= htmlspecialchars($first_name) ?>"
                required
        > 
        <br>
        <input type="number" 
                name="age" 
                placeholder="Věk" 
                min="10" 
                value="<?= htmlspecialchars($age) ?>"
                required                        
        >
        <br>
        <textarea name="live"   
                    placeholder="Podrobnosti o žákovi"
                ><?= htmlspecialchars($live) ?></textarea> 
        <br>
        <input type="text" 
                name="collage" 
                placeholder="Kolej" 
                value="<?= htmlspecialchars($collage) ?>"
                required                        
        >
        <br>
        <button>Přidat</button>
    </form>
</body>
</html>