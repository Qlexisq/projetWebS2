// document ready in ES6
Document.prototype.ready = callback => {
	if (callback && typeof callback === 'function') {
		document.addEventListener("DOMContentLoaded", () => {
			if (document.readyState === "interactive" || document.readyState === "complete") {
				return callback();
			}
		});
	}
};

(function() {
	showProject();


})();

function showProject(){
	// construction des queries
	let params = {};
	params['project'] = "";
	let url = new URL("php/read-project.php", "http://localhost/projetWebS2/");
	//let url = new URL("php/read-project.php", "https://imackickstarter.000webhostapp.com/");
	url.search = new URLSearchParams(params);
	console.log(url);

	// méthode GET
	fetch(url)
		.then(response => {
			return response.json();
		})
		.then(data => {
			console.log(data);
			if (data.length == 0) {
				document.getElementById('project').insertAdjacentHTML('beforeend', "Nothing found");
			} else {
				data.forEach(function(element) {
					var vote = (element.vote.length*10)/5;

					document.title = "GOODIMAC - " + element.name_project;
					var html = [
						'<div class="projectContent">',
						'<div class="row">',
						'<div class="col-12 col-md-4">',
						'<div class="projectImage">',
						'<img class="w-100" src="'+element.goodies+'"/>',
						'<img class="w-100 mt-md-2" src="'+element.template+'"/>',
						'</div>',
						'</div>',
						'<div class="col-12 col-md-8">',
						'<!-- change title dynamically -->',
						'<div class="projectTitle">' + element.name_project + '</div>',
						'<!-- change date dynamically -->',
						'<div class="projectDate"> Projet mis en ligne le ' + element.date_project,
						'<!-- change pseudo dynamically -->',
						'<br>Par : '+element.user,
						'</div>',
						'<div class="progress projectProgress">',
						'<!-- change progress-bar width(style.css) and aria-valuenow dynamically -->',
					    '<div class="progress-bar" id="select-progress-bar-'+element.id_project+'" role="progressbar" aria-valuenow="'+vote+'" aria-valuemin="0" aria-valuemax="100"></div>',
						'</div>',
						'<!-- change percentage dynamically -->',
						'<div class="thumbnailPercentage">Soutenu à '+vote+'%</div>',
						'<!-- change description dynamically -->',
						'<div class="projectDescription">' + element.description_project + '</div>',
						'<div class="text-right projectButtonBox">',
						'<!-- change data-target dynamically -->',
						'<button class="myButton projectButton" data-toggle="modal" data-target="#not-logged" id="soutien-'+element.id_project+'">Soutenir',
						'<div class="buttonSticker projectButtonHeart d-flex justify-content-center align-items-center">',
						'<img src="./img/heart.png"/>',
						'</div>',
						'</button>',
						'</div>',
						'</div>',
						'</div>',
						' </div>',
					].join("\n");
					document.getElementById('project').insertAdjacentHTML('beforeend', html);
					var bar=document.getElementById('select-progress-bar-'+element.id_project);
					bar.style.width = vote+'%';

					youWillLove();
				})
			}
		})
		.catch(error => {
			console.log(error);
		});
	// bloc catch appelé lorsqu'il y a une erreur
}

function youWillLove() {

	// construction des queries
	var i = 0;
	let params = {};
	params['project'] = "all";
	params['tri'] = 'random';
	let url = new URL("php/discover-projet.php", "http://localhost/projetWebS2/");
	//let url = new URL("php/discover-projet.php", "https://imackickstarter.000webhostapp.com/");
	url.search = new URLSearchParams(params);
	console.log(url);
	var i = 0;
	// méthode GET
	fetch(url)
		.then(response => {
			return response.json();
		})
		.then(data => {

			if (data.length == 0) {
				document.getElementById('galleryProjects').appendChild(document.createTextNode("Nothing Found"));
			} else {
				data.forEach(function(element) {
					var vote = (element.vote.length*10)/5;

					var html = [
						'<div class="col-md-3">',
						'<div class=" projectThumbnail">',
						'<div class="thumbnailImageBox text-center">',
						'<!-- change image file path dinamically -->',
						 '<img class="thumbnailImage" src="'+element.template+'"/>',
						'</div>',
						'<!-- change project title dinamically -->',
						'<div class="thumbnailTitle">' + element.name_project + '</div>',
						'<div class="progress">',
						'<!-- change progress-bar width(style.css) and aria-valuenow dynamically -->',
					    '<div class="progress-bar" id="progress-bar-'+element.id_project+'" role="progressbar" aria-valuenow="'+vote+'" aria-valuemin="0" aria-valuemax="100"></div>',
						'</div>',
						'<!-- change percentage dynamically -->',
						'<div class="thumbnailPercentage">Soutenu à '+vote+'%</div>',
						'<!-- change description dynamically -->',
						'<div class="thumbnailText">' + element.description_project + '</div>',
						'<div class="text-center thumbnailButtonBox">',
						'<a class="thumbnailLink" href="./project.php">',
						'<button class="myButton thumbnailButton" id="soutien-' + element.id_project + '">Soutenir',
						'<div class="buttonSticker buttonHeart d-flex justify-content-center align-items-center">',
						'<img src="./img/heart.png"/>',
						'</div>',
						'</button>',
						'</a>',
						'</div>',
						'</div>',
						'</div>',
					].join("\n");

					document.getElementById('galleryProjects').insertAdjacentHTML('beforeend', html);
					var bar=document.getElementById('progress-bar-'+element.id_project);
					bar.style.width = vote+'%';

					document.getElementById("soutien-"+element.id_project).onclick = event => {
						let params = {};
						params['project'] = element.id_project;
						let url = new URL("php/discover-projet.php", "http://localhost/projetWebS2/");
						//let url = new URL("php/discover-projet.php", "https://imackickstarter.000webhostapp.com/");
						url.search = new URLSearchParams(params);
						console.log(url);

						// méthode GET
						fetch(url);
					};
					if (i == 3) {
						throw BreakException;
					}
					i++;
				});
				console.log(data);
			}
		})
		.catch(error => {
			console.log(error);
		});
	// bloc catch appelé lorsqu'il y a une erreur
};