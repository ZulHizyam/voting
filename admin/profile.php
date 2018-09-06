<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

    
    
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}
body {
    background-image: url(../images/ILPKL.jpg);
        
    }

.column {
  float: center;
  width: 33.3%;
  margin-bottom: 30px;
  padding: 20px 0px ;
  background-color: white;
  box-shadow: 10px 10px 5px transparent;
    box-shadow: 0 40px 80px 0 rgba(0, 0, 0, 0.7);
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}



.container {
  padding: 0px 6px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: green;
  text-align: center;
  cursor: pointer;
  width: 80%;
}

.button:hover {
  background-color: #555;
}
</style>
</head>
<body>


  <center><div class="column">
    <center><div class="card">
      <img src="../images/user-126.jpg" alt="#" style="width:50%">
      <div class="container">
        <h2>Puan Parameswari A/P Letchemenen</h2>
        <p class="title">Administrator</p>
        <p>I'm a Girl </p>
        <a href="mailto:parmeswari.jtm@1govuc.gov.my?subject=subject&cc=parmeswari.jtm@1govuc.gov.my">Parmeswari.jtm@1govuc.gov.my</a>
        <p><a class="button" href="../admin/homepage.php" role="button">Back</a></p>
      </div>
        </div>
      </center>
  </div>
  </center>

</body>
</html>
