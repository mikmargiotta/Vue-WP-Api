<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php if(is_front_page()) {
      echo get_bloginfo('name') .' - '. get_bloginfo('description');
    }else{
      echo wp_title( ' - ', false, 'right').get_bloginfo('name');
    }?></title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
 <div id="app">
  <input type="text" v-model="title">
  <button @click="addPost">New post</button>
   <ul id="post" v-if="posts.length > 0">
     <li v-for="(post, index) in posts" :key="index">
        <input type="text" v-model="post.title.rendered" title="edit">
        <button @click="updatePost(post.id, index)">update</button>
        <button @click="removePost(post.id)">remove</button>
     </li>
   </ul>
 </div>
<?php wp_footer(); ?>
</body>
</html>