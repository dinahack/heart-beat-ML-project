from flask import Flask,render_template,request




app = Flask(__name__)




@app.route('/')
def index():
	return render_template('htanly.html')


@app.route('/', methods=['POST'])
def getvalue():
	
	age = int(request.form['age'])
	sex = request.form['sex']
	cp = request.form['cp']
	trestbps = int(request.form['trestbps'])
	chol = int(request.form['chol'])
	fbs = int(request.form['fbs'])
	restecg = request.form['restecg']
	thalach = int(request.form['thalach'])
	exang = request.form['exang']
	oldpeak = float(request.form['oldpeak'])
	slope = request.form['slope']
	ca = request.form['ca']
	thal = (request.form['thal'])

	qage = age
	qsex = sex
	qcp = cp
	qtrestbps = trestbps
	qchol = chol
	qfbs = fbs
	qrestecg = restecg 
	qthalach = thalach
	qexang = exang
	qoldpeak = oldpeak
	qslope = slope
	qca = ca
	qthal = thal

	#sex
	if sex=="female":
		pass 
		sex=0;
	elif sex=="male":
		pass
		sex=1
	else:
		pass
		raise Exception('Enter the Sex Correctly')

	#cp
	if cp=="ta":
		pass 
		cp=0;
	elif cp=="aa":
		pass
		cp=1
	elif cp=="np":
		pass
		cp=2
	elif cp=="as":
		pass
		cp=3
	else:
		pass
		raise Exception('ENTER the CP value Correctly')

	#restecg
	if restecg=="nl":
		pass 
		restecg=0;
	elif restecg=="st":
		pass
		restecg=1
	elif cp=="llh":
		pass
		restecg=2
	else:
		pass
		raise Exception('ENTER the RESTecg value Correctly')

	#exang
	if exang=="yes":
		pass 
		exang=1;
	elif exang=="no":
		pass
		exang=0
	else:
		pass
		raise Exception('ENTER the EXANG value Correctly')

	#slope
	if slope=="up":
		pass 
		slope=0;
	elif slope=="flat":
		pass
		slope=1
	elif slope=="ds":
		pass
		slope=2	
	else:
		pass
		raise Exception('ENTER the SLOPE value Correctly')

	#ca
	if ca=="zero":
		pass 
		ca=0;
	elif ca=="one":
		pass
		ca=1
	elif ca=="two":
		pass
		ca=2
	elif ca=="three":
		pass
		ca=3		
	else:
		pass
		raise Exception('ENTER the CA value Correctly')


	#thal
	if thal=="nl":
		pass 
		thal=1;
	elif thal=="fd":
		pass
		thal=2
	elif thal=="rd":
		pass
		thal=3	
	else:
		pass
		raise Exception('ENTER the THAL value Correctly')

	#fbs
	if fbs>120:
		pass
		fbs=1
	else:
		pass
		fbs=0


	data = [[age,sex,cp,trestbps,chol,fbs,restecg,thalach,exang,oldpeak,slope,ca,thal]]

	import numpy as np 
	import pandas as pd
	import matplotlib.pyplot as plt
	import seaborn as sns
	df = pd.read_csv('heart.csv')
	from sklearn.model_selection import train_test_split
	Y = df['target']
	X = df.drop(columns=['target'], axis=1)
	X_train, X_test, Y_train, Y_test = train_test_split(X, Y, test_size=0.2, random_state=42)
	from sklearn.linear_model import LogisticRegression 
	from sklearn.metrics import accuracy_score
	clf = LogisticRegression()
	clf.fit(X_train,Y_train)
	predictions = clf.predict(data)

	if predictions==1:
		pass
		answer="You need to keep your Heart Healthy"
	elif predictions==0:
		pass
		answer="Your HEART is Healthy"
		
		
	if qsex=="male":
		qsex="MALE"
	elif qsex=="female:
		qsex="FEMALE"
		
        if qcp=="ta":
		qcp="Typical Angina (type 1)"
	elif qcp=="aa":
		qcp="Atypical Angina (type 2)"        
	elif qcp=="np":
		qcp="Non-Anginal Pain (type 3 )"
	elif qcp=="as":
		qcp="Asymptomatic (type 4 )"

	


	return render_template('pass.html',pre=predictions,ans=answer, a=qage, s=qsex, c=qcp, t=qtrestbps,ch=qchol,f=qfbs,r=qrestecg,th=qthalach,e=qexang,o=qoldpeak,slope=qslope,ca=qca,thal=qthal)

if __name__ == '__main__':
	app.run(debug=True)
