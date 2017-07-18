<?php
if( !class_exists(EeweeFlattr)){
	class EeweeFlattr{
		
		function __construct(){
                    $this->init();
                    
                    // SHORTCODE
                    add_shortcode( 'flattr-widget', array($this, 'shortcode_flattr_widget') );
		}//fin constructeur

		// init
		function init(){ 
                    $this->getOptionsAdmin();
                
                    //add_action("wp_head", array($this, "flattrJS") );
                }

		// execute lors de l'activation du plugin
		function eewee_activate(){}

		// execute lors de la désactivation du plugin
		function eewee_deactivate(){}
		
		/**
		 * Gestion des menus du site
		 */
		function eewee_adminMenu(){
			// main menu
			add_menu_page( "eeweeFlattr", "Eewee Flattr", "manage_options", "idEeweeFlattr", array($this, menu), plugins_url("eewee_flattr/img/icon.png") );
			// submenu (into main menu)
			add_submenu_page( "idEeweeFlattr", "Manual", "Manual", "manage_options", "idSousMenuFlattr", array($this, sousMenu1));
			
			// menu B
//			add_object_page( "monMenuB", "monMenuB", "manage_options", "idMonMenuB", "fct_b" );
			// submenu (into main menu)
//			add_pages_page( "sousPages", "sous page ici", "manage_options", "idSousMenuPage", "fct_sousMenu");
			
			// appel init
			add_action('admin_init', array($this, 'init'));
		}
		
                
		/**
		 * Page : main menu
		 */
		function menu(){ echo "Main menu here"; }


		/**
		 * Page : submenu 1
		 */
		function sousMenu1(){ include(EEWEE_FLATTR_PLUGIN_DIR.'/view/manual.php'); }
		
		
                
                function flattrJS(){ ?>

                    <script type="text/javascript">
                    /* <![CDATA[ */
                        (function() {
                            var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
                            s.type = 'text/javascript';
                            s.async = true;
                            s.src = 'http://api.flattr.com/js/0.6/load.js?mode=auto';
                            t.parentNode.insertBefore(s, t);
                        })();
                    /* ]]> */</script>
                    
                <?php
                }
                
                
		
		/**
		 * Shortcode 
		 * @param unknown_type $atts
		 */
		function shortcode_flattr_widget( $atts="" ){
			extract( shortcode_atts(array('id'=>'', 'w'=>292, 'h'=>290, 'sh'=>false), $atts ));
                        $id = (int) $id;
                        $w  = (int) $w;
                        $h  = (int) $h;
                        
                        if( $sh ){
                            $showheader = "&noheader=1";
                        }else{
                            $showheader = "";
                        }
                        
                        if( !empty($id) ){
                            return '<iframe src="http://tools.flattr.net/widgets/thing.html?thing='.$id.$showheader.'" width="'.$w.'" height="'.$h.'"></iframe>';
                        }
                        
		}//fin function

		
		
		/**
		 * Définition des options
		 */
		function getOptionsAdmin(){
			//assigne les valeurs par défaut aux options d'administration
			$tbl_optionsAdmin = array(
				'f-enabled'	=> true,
				'exclude_ips'	=> ''
			);
			//recup les options stockées en bdd
			$options = get_option($this->adminOptionsName);
			//si les options existent dans la base de données, les valeurs par défaut sont écrasées par celles de la base			
			if( !empty($options) ){
				foreach( $options as $k=>$v ){
					$tbl_optionsAdmin[$k] = $v;
				}
			}
			//les options sont stockées dans la base
			update_option($this->adminOptionsName, $tbl_optionsAdmin);
			//les options sont renvoyées pour être utilisées
			return $tbl_optionsAdmin;
		}

	}//fin class
}//fin if
