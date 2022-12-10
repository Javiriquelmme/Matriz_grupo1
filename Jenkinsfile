pipeline {
    agent any
    triggers {
        pollSCM('* * * * *')
    }
    stages {
        stage("Compile") {
            steps {
                sh "./app/Views/prueba.py compileJava"
            }
        }
        stage("Unit test") {
            steps {
                sh "./app/Views/prueba.py test"
            }
        }
        stage("Code coverage") {
            steps {
        	    sh "./app/Views/prueba.py jacocoTestReport"
        	 	publishHTML (target: [
         	        reportDir: 'build/reports/jacoco/test/html',
         			reportFiles: 'index.html',
         			reportName: 'JacocoReport'
         	    ])
         		sh "./app/Views/prueba.py jacocoTestCoverageVerification"
         	}
        }
        stage('SonarQube analysis') {
            steps {
                withSonarQubeEnv('SonarQubePruebas') {
                    sh './app/Views/prueba.py sonarqube'
                }
            }
        }
    }
}
