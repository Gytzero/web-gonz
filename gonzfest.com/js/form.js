function dynamicdropdown(listindex)
{
		switch (listindex)
		{
		case "SD" :
				document.getElementById("lomba").options[10]=new Option("Futsal Putra","Futsal Putra");
				document.getElementById("lomba").options[11]=new Option("Mewarnai","Mewarnai");
				document.getElementById("lomba").options[12]=new Option("Spelling bee","Spelling bee");
				document.getElementById("lomba").options[13]=new Option("Vocal","Vocal");
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
		break;

		case "SMP" :
				document.getElementById("lomba").options[10]=new Option("Basket Putra","Basket Putra");
				document.getElementById("lomba").options[11]=new Option("Basket Putri","Basket Putri");
				document.getElementById("lomba").options[12]=new Option("Futsal Putra","Futsal Putra");
				document.getElementById("lomba").options[13]=new Option("Paduan Suara","Paduan Suara");
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
		break;

		case "SMA" :
				document.getElementById("lomba").options[1]=new Option("Basket Putra","Basket Putra");
				document.getElementById("lomba").options[2]=new Option("Basket Putri","Basket Putri");
				document.getElementById("lomba").options[3]=new Option("Bulu Tangkis","Bulu Tangkis");
				document.getElementById("lomba").options[4]=new Option("Cerdas Cermat","Cerdas Cermat");
				document.getElementById("lomba").options[5]=new Option("Cheerleading","Cheerleading");
				document.getElementById("lomba").options[6]=new Option("English Debate","English Debate");
				document.getElementById("lomba").options[7]=new Option("Futsal Putri","Futsal Putri");
				document.getElementById("lomba").options[8]=new Option("Pencak Silat","Pencak Silat");
				document.getElementById("lomba").options[9]=new Option("Saman","Saman");
				document.getElementById("lomba").options[10]=new Option("Mini Soccer","Mini Soccer");
				document.getElementById("lomba").options[11]=new Option("Modern Dance","Modern Dance");
				document.getElementById("lomba").options[12]=new Option("Voli Putra","Voli Putra");
				document.getElementById("lomba").options[13]=new Option("Wall Climbing","Wall Climbing");
		break;

		case "UMUM" :
				document.getElementById("lomba").options[7]=new Option("Band","Band");
				document.getElementById("lomba").options[8]=new Option("Catur","Catur");
				document.getElementById("lomba").options[9]=new Option("DOTA 2","DOTA 2");
				document.getElementById("lomba").options[10]=new Option("FIFA","FIFA");
				document.getElementById("lomba").options[11]=new Option("Fotografi","Fotografi");
				document.getElementById("lomba").options[12]=new Option("Mural","Mural");
				document.getElementById("lomba").options[13]=new Option("Stand Up Comedy","Stand Up Comedy");
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
				document.getElementById("lomba").remove(1);
		break;
	}
		return true;
}