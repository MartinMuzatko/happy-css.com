<rain>
	<div class="rain align_center">
		<div each={droplet in droplets} 
			style="animation-duration: {(Math.random()*2)+0.5}s; top: -{random(20) | 0}%; left: {random(100) | 0}%"
			class="droplet"></div>
		<a href="http://makameowart.tumblr.com/post/129875251526/makameow-yo-got-addicted-to-undertale-by">
			<img src="/site/assets/files/1068/undertale_umbrella-v1.png" alt="">
		</a>
	</div>
	<style>
		.rain {
			background-color: #171054;
			width: 30em;
			position: relative;
			overflow: hidden;
		}
		.rain .droplet {
			background: linear-gradient(to bottom, transparent, #2e20aa);
			width: 1%;
			height: 5%;
			border-radius: 100%;
			position: absolute;
			animation: rain 1.5s linear;
			animation-iteration-count: infinite;
			z-index: 1;
		}
		.rain img {
			z-index: 2;
			position: relative;
		}
		@keyframes rain {
			100% {
				top: 100%;
			}
		}
		img {
			max-width: 100%;
		}

	</style>
	<script>
		this.droplets = 'x'.repeat(16).split('')
		this.random = function(val)
		{
			return Math.random() * val | 0
		}

	</script>
</rain>
