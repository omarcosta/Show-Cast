<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Itens de pedido</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 95%;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table thead tr th{
          text-align: center;  
        }
        table tr td:last-child a{
            margin-right: 15px;

        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body aling="center">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                       <a href="../index.html" class="btn btn-default pull-left"><img src="../img/home.png" width="24px" height="24px"></a>
                        <h2 class="pull-left">&nbsp;&nbsp;Itens de pedidos - Detalhes</h2>
                        <a href="create.php" class="btn btn-success pull-right">Novo Itens de pedido</a>
                    </div>
                    <?php
                    // Include config file
                    require_once 'config.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM itensdepedidos";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Cod</th>";
                                        echo "<th>Quantidade</th>";
                                        echo "<th>valor Parcial</th>";
                                        echo "<th>Código pedido</th>";
                                        echo "<th>Código produto</th>";
                                        echo "<th>Ação</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['coditensdepedidos'] . "</td>";
                                        echo "<td>" . $row['quantidade'] . "</td>";
                                        echo "<td>" . $row['valorparcial'] . "</td>";
                                        echo "<td>" . $row['fk_codpedido'] . "</td>";
                                        echo "<td>" . $row['fk_codproduto'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?coditensdepedidos=". $row['coditensdepedidos'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?coditensdepedidos=". $row['coditensdepedidos'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?coditensdepedidos=". $row['coditensdepedidos'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>