<example>
	<div each={user, key in users}>
		{key} - {user.name} is {user.age} years old
	</div>
	this.users = [
		{name : 'John', 	age : 20}, 
		{name : 'Jake', 	age : 20}, 
		{name : 'Jayson', 	age : 20}, 
		{name : 'Jenny', 	age : 20}, 
		{name : 'Jessica', 	age : 20}
	]
</example>