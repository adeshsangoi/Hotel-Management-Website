<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Photo Sphere Viewer</title>
		<meta name="viewport" content="initial-scale=1.0" />
		<script src="360view/three.min.js"></script>
		<script src="360view/photo-sphere-viewer.min.js"></script>
		<style>
			html, body {
				margin: 0;
				width: 100%;
				height: 100%;
				overflow: hidden;
			}

			#container {
				width: 100%;
				height: 100%;
			}
		</style>
	</head>

	<body>
		<div id="container"></div>

		<script>
			var div = document.getElementById('container');
			var PSV = new PhotoSphereViewer({
					panorama: '343.jpg',
					container: div,
					time_anim: 3000,
					navbar: true,
					navbar_style: {
						backgroundColor: 'rgba(58, 67, 77, 0.7)'
					},
				});
		</script>
	</body>

</html>
