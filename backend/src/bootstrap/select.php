<?php 
$categories = [
    'Habillement',
    "Alimentation",
    "Vetement",
    'Fashion',
    "Technologie",
    'Informatique',
    'Maison',
    'Eléctronique',
    'Consmetic',
    'Autres'
];

?>

<!-- Bootstrap CSS -->
<link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
<script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
<script src="library/dselect.js"></script>


<select name="select_box" class="form-select" id="select_box">
    <option value="">Select Country</option>
    <?php 
    for ($i=0; $i < 10; $i++) { 
        echo '<option value="'.$categories[$i].'">'.$categories[$i].'</option>';
    }
    ?>  
</select>

<script>
    var select_box_element = document.querySelector('#select_box');
    dselect(select_box_element, {
        search: true
    });
</script>