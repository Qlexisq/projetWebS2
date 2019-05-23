// construction des queries
	var i = 0;
	let params = {};
	params['project'] = "all";
	params['tri'] = 'pourcent-up';
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

					document.getElementById('home-project').insertAdjacentHTML('beforeend', html);
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