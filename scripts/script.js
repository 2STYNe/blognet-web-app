const d = new Date();

const DATE =
	String(d.getDate()) +
	"/" +
	String(d.getMonth()) +
	"/" +
	String(d.getFullYear());

const TIME = d.toLocaleString(
	"en-US",

	{
		hour: "numeric",

		minute: "numeric",

		hour12: true,
	}
);

const dateTime = DATE + ", " + TIME;

document.getElementById("blogDate").value = dateTime;
