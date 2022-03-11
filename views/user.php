<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcılar</title>
    
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: gray;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        .result{
            margin: 0 auto;
            text-align: center;
            line-height: 35px;
            width: 95%;
            height: 35px;
            background-color: red;
            color: white;
        }
        .container{
            margin: 10px auto;
            width: 75%;
            height: auto;
            padding: 5px;
            background-color: white;
        }
    </style>

</head>
<body>



        
    <?php if(!empty($result)): ?>
        <div class="result">
            <?= $result[0]; ?>
        </div>  
    <?php endif; ?>  


    <?php if(empty($user_update[1])): ?>
        <div class="result"> 
            <?= @$user_update[0]; ?>
        </div>
    <?php endif; ?>
    <?php if(empty($data[1])): ?>
        <div class="result"> 
            <?= @$data[0]; ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($data[1])): ?>
    <div class="container">
        <h2>Kullanıcılar</h2>
        <table>
            <tr>
                <th>email</th>
                <th>isim</th>
                <th>şifre</th>
            </tr>
            <tr>
                <?php foreach($data[1] as $item): ?>
                    <td><?= $item["email"]; ?></td>
                    <td><?= $item["name"]; ?></td>
                    <td><?= $item["pass"]; ?></td>
                <?php endforeach; ?>
            </tr>

        </table>
    </div>
    <?php endif; ?>


    <a href="users">Kullanıcılar</a> | 
    <a href="update_user">Kullanıcı Değiştir</a>

</body>
</html>