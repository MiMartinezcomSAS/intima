<div id="google-container"></div>
<div id="cd-zoom-in"></div>
<div id="cd-zoom-out"></div>
<select id="select" name="">
    <option value='4.598056000000001,-74.07583299999999,bogota'  <?php if($_GET['ci'] == 'bogota'){echo('selected');} ?>>Bogotá</option>
    <option value='6.230833,-75.59055599999999,medellin' <?php if($_GET['ci'] == 'cali'){echo('medellin');} ?> >Medellín</option>
    <option value='3.420556,-76.522222,cali' <?php if($_GET['ci'] == 'cali'){echo('selected');} ?>>Cali</option>
<option value='4.528611,-75.70416699999998,armenia' <?php if($_GET['ci'] == 'armenia'){echo('selected');} ?>>Armenia</option>
<option value='10.9642103,-74.79704349999997,barranquilla' <?php if($_GET['ci'] == 'barranquilla'){echo('selected');} ?>>Barranquilla</option>
<option value='7.113309999999999,-73.12046800000002,bucaramanga' <?php if($_GET['ci'] == 'bucaramanga'){echo('selected');} ?>>Bucaramanga</option>
<option value='3.886611,-77.07022899999998,buenaventura' <?php if($_GET['ci'] == 'buenaventura'){echo('selected');} ?>>Buenaventura</option>
<option value='5.481884,-75.211462,caldas' <?php if($_GET['ci'] == 'caldas'){echo('selected');} ?>>Caldas</option>
<option value='10.41373,-75.53357690000001,cartagena' <?php if($_GET['ci'] == 'cartagena'){echo('selected');} ?>>Cartagena</option>
<option value='7.894167 ,-72.50388900000002,cucuta' <?php if($_GET['ci'] == 'cucuta'){echo('selected');} ?>>Cúcuta</option>
<option value='5.825397,-73.04015400000003,duitama' <?php if($_GET['ci'] == 'duitama'){echo('selected');} ?>>Duitama</option>
<option value='1.75 , -75.58333299999998,florencia' <?php if($_GET['ci'] == 'florencia'){echo('selected');} ?>>Florencia</option>
<option value='4.440663,-75.24414100000001,ibague' <?php if($_GET['ci'] == 'ibague'){echo('selected');} ?>>Ibague</option>
<option value='5.067132,-75.51828799999998,manizales' <?php if($_GET['ci'] == 'manizales'){echo('selected');} ?>>Manizales</option>
<option value='8.809082,-75.869265,monteria' <?php if($_GET['ci'] == 'monteria'){echo('selected');} ?>>Montería</option>
<option value='2.998611,-75.3044439999999,neiva' <?php if($_GET['ci'] == 'neiva'){echo('selected');} ?>>Neiva</option>
<option value='1.207778,-77.277222,pasto' <?php if($_GET['ci'] == 'pasto'){echo('selected');} ?>>Pasto</option>
<option value='4.814278,-75.69455800000003,pereira' <?php if($_GET['ci'] == 'pereira'){echo('selected');} ?>>Pereira</option>
<option value='1.856293,-76.039391000,pitalito' <?php if($_GET['ci'] == 'pitalito'){echo('selected');} ?>>Pitalito</option>
<option value='11.241944,-74.205278000,santamarta' <?php if($_GET['ci'] == 'santamarta'){echo('selected');} ?>>Santa Marta</option>
<option value='10.961499224861,-74.79188537597656,soledad' <?php if($_GET['ci'] == 'soledad'){echo('selected');} ?>>Soledad</option>
<option value='4.083333,-76.199999999,tulua' <?php if($_GET['ci'] == 'tulua'){echo('selected');} ?>>Tulúa</option>
<option value='5.533333,-73.366667,tunja' <?php if($_GET['ci'] == 'tunja'){echo('selected');} ?>>Tunja</option>
<option value='5.533333,-73.36666,valledupar' <?php if($_GET['ci'] == 'valledupar'){echo('selected');} ?>>Valledupar</option>
<option value='4.149999999999999,-73.633333,villavicencio' <?php if($_GET['ci'] == 'villavicencio'){echo('selected');} ?>>Villavicencio</option>
<option value='5.346555,-72.40556300000003,yopal' <?php if($_GET['ci'] == 'yopal'){echo('selected');} ?>>Yopal</option>
<option value='5.0273519,-74.0096889,zipaquira' <?php if($_GET['ci'] == 'zipaquira'){echo('selected');} ?>>Zipaquira</option>
<option value='7.103618,-73.847566,barrancabermeja'<?php if($_GET['ci'] == 'barrancabermeja'){echo('selected');} ?>>Barrancabermeja</option>
<option value='5.026002999999999,-74.03001219999999,cundinamarca'<?php if($_GET['ci'] == 'cundinamarca'){echo('selected');} ?>>Cundinamarca</option>
</select>
<ul id="ciudades">
<?php
global $post;
$args = array('category_name' => 'mapaCiudades',
	'posts_per_page' => 50,);
$wp_query = new WP_Query( $args );
while ($wp_query->have_posts()) : $wp_query->the_post();

        ?>
        <li id="<?php echo get_post_meta($post->ID, 'ciudad', true); ?>">

            <div class="tableMap">
                <?php the_content();?>

            </div>
        </li>

<?php endwhile ?>
</ul>
<input id="ciudadGetLa" type="hidden" value="<?php echo($_GET['la']) ?>"/>
<input id="ciudadGetLo" type="hidden" value="<?php echo($_GET['lo']) ?>"/>
<input id="ciudadGetCi" type="hidden" value="<?php echo($_GET['ci']) ?>"/>
