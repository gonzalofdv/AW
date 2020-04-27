const getRemainTime = deadline => {
	let now = new Date();
		remainTime = (new Date(deadline) - now + 1000) / 1000,
		remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
		remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
		remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
		remainDays = Math.floor(remainTime / (3600 * 24));

	return {
		remainTime, 
		remainSeconds,
		remainMinutes,
		remainHours,
		remainDays 
	}
};

const countdown = (deadline, elem, finalMessage) => {
	const el = document.getElementById(elem);

	const timerUpdate = setInterval( () => {
		let t = getRemainTime(deadline);
		el.innerHTML = `${t.remainMinutes}m:${t.remainSeconds}s`;

		if(t.remainTime <= 1){
			clearInterval(timerUpdate)
			el.innerHTML = finalMessage;
			setTimeout("document.getElementById('formularioQuiz').submit()",3000)
		}
	}, 1000)
};

function contador() {
    var fecha = new Date();
    var sumarsesion = 20;
    fecha.setSeconds(fecha.getSeconds()+sumarsesion);
    return fecha;
}

countdown(contador(), 'clock', 'Se ha terminado el tiempo');