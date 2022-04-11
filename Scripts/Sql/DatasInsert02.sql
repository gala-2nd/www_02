-- stat.execute("set names gb2312");
-- set names utf8;
INSERT INTO t_test_m (
	CODE,
	title,
	sub_title,
	sub_cn,
	sub_en,
	direction,
	ctime,
	testminute,
	startTime,
	endTime,
	editor
)
VALUES
	(   'HSDS',
		'霍兰德职业兴趣测试',
		'HSDS',
		'职业兴趣测试',
		'HSDS',
		'人格即个性，它与职业有着密切的关系，不同职业对从业者的人格特征的要求是有差距的，如果通过科学的测试，可以预知自己的人格特征，这有助于选择适合于个人发展的职业。您将要阅读的这个《职业价格自测问卷》，可以帮助您作一次简单的人格自评，从而获自己的人格特征更适合从事哪方面的工作。请根据对每一题目的第一印象作答，不必仔细推敲，答案没有好坏、对错之分。具体填写方法是，根据自己的情况回答“是” 或“否” 。 '
		,now()
		,10
		,now()
		,'2050-01-01',
		' gala_2ed '
		)
;
INSERT INTO t_test_m (
	CODE,
	title,
	sub_title,
	sub_cn,
	sub_en,
	direction,
	ctime,
	testminute,
	startTime,
	endTime,
	editor
)
VALUES
	('PSTR',
		'心理压力测试（PSTR专业版）',
		'PSTR',
		'心理压力测试',
		'PSTR',
		'压力既可以是你生活的助手也可以变成生活的阻碍。PSTR心理压力测试，帮助你了解自己面临的心理压力程度。'
		,now()
		,10
		,now()
		,'2050-01-01',
		' admin '
		)

