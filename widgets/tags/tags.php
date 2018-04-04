<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Show a list of blog categories.
 *
 * @author        Stephen Cozart
 * @author        PyroCMS Dev Team
 * @package       PyroCMS\Core\Modules\Blog\Widgets
 */
class Widget_Tags extends Widgets
{
	public $author = 'Sistemas DYN';

	public $website = 'http://www.sistemasdyn.com.mx';

	public $version = '1.0.0';

	public $title = array(
		'en' => 'Blog Tags',
		'es' => 'Blog Etiquetas',
		'br' => 'Categorias do Blog',
		'pt' => 'Categorias do Blog',
		'el' => '&Kappa;&alpha;&tau;&eta;&gamma;&omicron;&rho;&#943;&epsilon;&sigmaf; &Iota;&sigma;&tau;&omicron;&lambda;&omicron;&gamma;&#943;&omicron;&upsilon;',
		'fr' => 'Cat&eacute;gories du Blog',
		'ru' => '&#1050;&#1072;&#1090;&#1077;&#1075;&#1086;&#1088;&#1080;&#1080; &#1041;&#1083;&#1086;&#1075;&#1072;',
		'id' => 'Kateori Blog',
            'fa' => '&#1605;&#1580;&#1605;&#1608;&#1593;&#1607; &#1607;&#1575;&#1740; &#1576;&#1604;&#1575;&#1711;',
	);

	public $description = array(
		'en' => 'Show a list of blog tags',
		'es' => 'Permite visualizar las etiquetas de las noticias',
		'br' => 'Mostra uma lista de navega&ccedil;&atilde;o com as categorias do Blog',
		'pt' => 'Mostra uma lista de navega&ccedil;&atilde;o com as categorias do Blog',
		'el' => '&Pi;&rho;&omicron;&beta;&#940;&lambda;&epsilon;&iota; &tau;&eta;&nu; &lambda;&#943;&sigma;&tau;&alpha; &tau;&omega;&nu; &kappa;&alpha;&tau;&eta;&gamma;&omicron;&rho;&iota;&#974;&nu; &tau;&omicron;&upsilon; &iota;&sigma;&tau;&omicron;&lambda;&omicron;&gamma;&#943;&omicron;&upsilon; &sigma;&alpha;&sigmaf;',
		'fr' => 'Permet d\'afficher la liste de Cat&eacute;gories du Blog',
		'ru' => '&#1042;&#1099;&#1074;&#1086;&#1076;&#1080;&#1090; &#1089;&#1087;&#1080;&#1089;&#1086;&#1082; &#1082;&#1072;&#1090;&#1077;&#1075;&#1086;&#1088;&#1080;&#1081; &#1073;&#1083;&#1086;&#1075;&#1072;',
		'id' => 'Menampilkan daftar kategori tulisan',
            'fa' => '&#1606;&#1605;&#1575;&#1740;&#1588; &#1604;&#1740;&#1587;&#1578;&#1740; &#1575;&#1586; &#1605;&#1580;&#1605;&#1608;&#1593;&#1607; &#1607;&#1575;&#1740; &#1576;&#1604;&#1575;&#1711;',
	);

	public function run()
	{
		$this->load->model('blog/blog_m');
		$this->load->library(array('keywords/keywords'));
		$limit=100;
		//$keywords = $this->keyword_m->order_by('name')->get_all();
		
		
		$posts = $this->blog_m->select('keywords')->get_all();

		$buffer = array(); // stores already added keywords
		$tags   = array();
		
		foreach($posts as $p)
		{
			$kw = Keywords::get_array($p->keywords);
			
			foreach($kw as $k)
			{
				$k = trim(strtolower($k));
				
				if(!in_array($k, $buffer)) // let's force a unique list
				{
					$buffer[] = $k;

					$tags[] = array(
						'title' => ucfirst($k),
						'url'   => site_url('blog/tagged/'.$k)
					);
				}
			}
		}
		
		if(count($tags) > $limit) // Enforce the limit
		{
			$tags= array_slice($tags, 0, $limit);
		}
	
		//return $tags;
		
		
		return array('keywords' => $tags);
	}

}
