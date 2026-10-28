<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Breast Lesion Decision Tree Classifier</title>
  </head>
  <link rel="stylesheet" href="style.css">
  <body>
    <main>
    <h1>Breast Lesion Decision Tree Classifier</h1>
    <form method="post">
      <input type="text" name="age" value="Age" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
      <input type="text" name="tissue_composition" value="Tissue Composition" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
      <input type="text" name="signs" value="Signs" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/><br>
      <input type="text" name="symptoms" value="Symptoms" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
      <input type="text" name="shape" value="Shape" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
      <input type="text" name="margin" value="Margin" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/><br>
      <input type="text" name="echogenicity" value="Echogenicity" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
      <input type="text" name="posterior_features" value="Posterior Features" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
      <input type="text" name="halo" value="Halo?" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/><br>
      <input type="text" name="calcifications" value="Calcifications?" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/>
      <input type="text" name="skin_thickening" value="Skin Thickening?" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue"/><br>
      <input type="submit" name="compute" value="Classify"/>
    </form>
    <?PHP 
      if (array_key_exists('compute', $_POST)) {
        // Change path to your system
        $inputs = [
          $_POST['age'],
          $_POST['tissue_composition'],
          $_POST['signs'],
          $_POST['symptoms'],
          $_POST['shape'],
          $_POST['margin'],
          $_POST['echogenicity'],
          $_POST['posterior_features'],
          $_POST['halo'],
          $_POST['calcifications'],
          $_POST['skin_thickening']
        ];

        // Keep spaces within each input
        $args = implode(' ', array_map('escapeshellarg', $inputs));

        // Keep your existing Python executable path here
        $python = 'C:\Users\nesro\Documents\GitHub\Breast-Lesion-Decision-Tree-Classifier\.venv\Scripts\python.exe';

        $output = shell_exec(
          escapeshellarg($python) . ' breastlesionclassifier.py ' . $args
        );
        if ($output == 0) {
          print "<p style='font-size: 15pt'>Classification: benign</p>";
        } else {
          print "Classification: malignant ";
        }
      }      
    ?>
    </main>
  </body>
</html>