$(document).ready(function(){
	$('#connexion').on('click', function(e){
	    e.preventDefault();
	  	var pseudo = $('#pseudo').val();
	    var password = $('#password').val();
	    $.ajax({
		    url: '../web/actions/connexion.php',
		    type: 'POST',
		    data:{
		   		pseudo:pseudo,
		    	password:password,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Connexion au serveur, connexion sécurisée à votre session...</div>');
	        		window.setTimeout(function(){window.location="/profil";},3000);
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#inscription').on('click', function(e){
	    e.preventDefault();
	  	var pseudo = $('#pseudo').val();
	  	var email = $('#email').val();
	    var password = $('#password').val();
	    var newpassword = $('#newpassword').val();
	    var captcha = $('#captcha').val();
	    var captcha_verif = $('#captcha_verif').val();
	    $.ajax({
		    url: '../web/actions/inscription.php',
		    type: 'POST',
		    data:{
		   		pseudo:pseudo,
		   		email:email,
		   		newpassword:newpassword,
		    	password:password,
		    	captcha:captcha,
		    	captcha_verif:captcha_verif,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Connexion au serveur, création de votre compte...</div>');
	        		window.setTimeout(function(){window.location="/profil";},3000);
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#change_password').on('click', function(e){
	    e.preventDefault();
	  	var mypassword = $('#mypassword').val();
	  	var newpassword = $('#newpassword').val();
	    var renewpassword = $('#renewpassword').val();
	    $.ajax({
		    url: '../web/actions/change_password.php',
		    type: 'POST',
		    data:{
		   		mypassword:mypassword,
		   		newpassword:newpassword,
		   		renewpassword:renewpassword,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Votre mot de passe a bien été changé, déconnexion de votre compte...</div>');
	        		window.setTimeout(function(){window.location="/deconnexion";},3000);
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#configurations_site').on('click', function(e){
	    e.preventDefault();
	  	var nom_site = $('#nom_site').val();
	  	var lien_site = $('#lien_site').val();
	    $.ajax({
		    url: '../web/actions/configurations.php',
		    type: 'POST',
		    data:{
		   		nom_site:nom_site,
		   		lien_site:lien_site,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Les configurations du site ont bien été modifiées.</div>');
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#configurations_serveur').on('click', function(e){
	    e.preventDefault();
	  	var ip_vps = $('#ip_vps').val();
	  	var port_emu = $('#port_emu').val();
	  	var external_variables = $('#external_variables').val();
	  	var external_flash_texts = $('#external_flash_texts').val();
	  	var productdata = $('#productdata').val();
	  	var furnidata = $('#furnidata').val();
	  	var base_habbo_swf = $('#base_habbo_swf').val();
	  	var habbo_swf = $('#habbo_swf').val();
	    $.ajax({
		    url: '../web/actions/configurations.php',
		    type: 'POST',
		    data:{
		   		ip_vps:ip_vps,
		   		port_emu:port_emu,
		   		external_variables:external_variables,
		   		external_flash_texts:external_flash_texts,
		   		productdata:productdata,
		   		furnidata:furnidata,
		   		base_habbo_swf:base_habbo_swf,
		   		habbo_swf:habbo_swf,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Les configurations du serveur ont bien été modifiées.</div>');
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#recherche_joueur').on('click', function(e){
	    e.preventDefault();
	  	var pseudo = $('#pseudo').val();
	    $.ajax({
		    url: '../web/actions/modifications_joueur.php',
		    type: 'POST',
		    data:{
		   		pseudo:pseudo,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Redirection vers le profil de '+pseudo+' en cours...</div>');
	        		window.setTimeout(function(){window.location="/administration/modifications_joueur/"+pseudo+"";},3000);
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#modifications_joueur').on('click', function(e){
	    e.preventDefault();
	  	var id = $('#id').val();
	  	var credits = $('#credits').val();
	  	var duckets = $('#duckets').val();
	  	var diamants = $('#diamants').val();
	    $.ajax({
		    url: '../../web/actions/modifications_joueur.php',
		    type: 'POST',
		    data:{
		   		id:id,
		   		credits:credits,
		   		duckets:duckets,
		   		diamants:diamants,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Le compte du joueur a bien été modifié.</div>');
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#grade_joueur').on('click', function(e){
	    e.preventDefault();
	  	var pseudo = $('#pseudo').val();
	  	var grade = $('#grade').val();
	    $.ajax({
		    url: '../web/actions/modifications_joueur.php',
		    type: 'POST',
		    data:{
		   		pseudo:pseudo,
		   		grade:grade,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Le joueur '+pseudo+' a bien été grader.</div>');
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});
console.log('Ce site est propulsé par le CMS LiteCMS créé par TheoDEV avec la template de Billstrack.');
$(document).ready(function(){
	$('#creation_article').on('click', function(e){
	    e.preventDefault();
	  	var titre = $('#titre').val();
	  	var description = $('#description').val();
	  	var url_image = $('#url_image').val();
	  	var contenu = CKEDITOR.instances['contenu'].getData();
	    $.ajax({
		    url: '../web/actions/creation_article.php',
		    type: 'POST',
		    data:{
		   		titre:titre,
		   		description:description,
		   		url_image:url_image,
		   		contenu:contenu,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">L\'article « '+titre+' » a bien été créé et ajouté sur le site.</div>');
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});

$(document).ready(function(){
	$('#id_article').on('click', function(e){
	    e.preventDefault();
	  	var id_article = $('#id_article').val();
	    $.ajax({
		    url: '../web/actions/delete_article.php',
		    type: 'POST',
		    data:{
		   		id_article:id_article,
		    }
		}).done(function(a){
			var response = JSON.parse(a);
	        $.each(response, function(index, value){
	            if(response.response=="ok")
	        	{
	        		$("#reponse").html('<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">L\'article « '+id_article+' » a bien été supprimé du site.</div>');
	        	}
	        	else
	        	{
	            	$("#reponse").html('<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">'+value+'</div>');
	        	}
	        });
		});
	});
});