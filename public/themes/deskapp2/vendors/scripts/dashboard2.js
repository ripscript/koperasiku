$(".dial1").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 80 }, {
	duration: 3000,
	easing: "swing",
	step: function () {
		$(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
	}
});

$(".dial2").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 70 }, {
	duration: 3000,
	easing: "swing",
	step: function () {
		$(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
	}
});

$(".dial3").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 90 }, {
	duration: 3000,
	easing: "swing",
	step: function () {
		$(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
	}
});

$(".dial4").knob();
$({ animatedVal: 0 }).animate({ animatedVal: 65 }, {
	duration: 3000,
	easing: "swing",
	step: function () {
		$(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
	}
});
// map
jQuery('#browservisit').vectorMap({
	map: 'world_mill_en',
	backgroundColor: '#fff',
	borderWidth: 1,
	zoomOnScroll: false,
	color: '#ddd',
	regionStyle: {
		initial: {
			fill: '#fff'
		}
	},
	enableZoom: true,
	normalizeFunction: 'linear',
	showTooltip: true
});