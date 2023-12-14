<?php
include '../../controller/livraisonC2.php';
$livraisonC2 = new traitement_livraison();
$list = $livraisonC2->listeslivraison();
?>
<html>


<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        center {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        h2 a {
            text-decoration: none;
            color: #3498db;
        }

        h2 a:hover {
            color: #1e6faa;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        td form input[type="submit"],
        td a {
            display: inline-block;
            padding: 6px 12px;
            margin: 5px;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        td form input[type="submit"]:hover,
        td a:hover {
            background-color: #1e6faa;
        }
        html {
  overflow-x: hidden;
}


    </style>
</head>
<script>
    function confirmDelete(idliv) {
        var confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cette livraison ?");
        if (confirmDelete) {
            window.location.href = 'deletelivraison.php?idliv=' + idliv;
        }
    }
</script>

<body >

    <center>
        <h1>Liste des livraisons</h1>
        <h2><a href="ajouterlivraison2.php">Add livraison</a></h2>
    </center>

    <table border="1" align="center" width="70%">
        <tr>
            <th>numero livraison</th>
            <th>etat du livraison</th>
            <th>etat du colier</th>
            <th>adresse_depart</th>
            <th>Adresse d'arrivée </th>
            <th>telephone</th>
            <th>date</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?php
        foreach ($list as $livraison) {
        ?>
            <tr>
                <td><?= $livraison['idliv'] ?></td>
                <td><?= $livraison['etat_livraison'] ?></td>
                <td><?= $livraison['etat'] ?></td>
                <td><?= $livraison['adresse_du_depart'] ?></td>
                <td><?= $livraison['adresse_du_arrive'] ?></td>
                <td><?= $livraison['numero_telephone'] ?></td>
                <td><?= $livraison['date'] ?></td>
                <td align="center">
                    <form method="POST" action="updatelivraison.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" name="idliv" value="<?php echo $livraison['idliv']; ?>">
                        <input type="hidden" name="etat" value="<?php echo $livraison['etat']; ?>">
                        <input type="hidden" name="adresse_du_depart" value="<?php echo $livraison['adresse_du_depart']; ?>">
                        <input type="hidden" name="adresse_du_arrive" value="<?php echo $livraison['adresse_du_arrive']; ?>">
                        <input type="hidden" name="numero_telephone" value="<?php echo $livraison['numero_telephone']; ?>">
                        <input type="hidden" name="date" value="<?php echo $livraison['date']; ?>">
                    </form>
                </td>
               <!-- <td>
                    <a href="deletelivraison.php?idliv=<?php echo $livraison['idliv']; ?>">Delete</a>
        </td>-->
            <td>
   <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $livraison['idliv']; ?>)">Delete</a> 
</td>

                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>