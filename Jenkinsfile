pipeline {
    agent any
    triggers {
        pollSCM('* * * * *')
    }
    stages {
        stage("Compile") {
            steps {
                sh "./prueba.py compileJava"
            }
        }
        stage("Unit test") {
            steps {
                sh "./prueba.py test"
            }
        }
        stage("Code coverage") {
            steps {
        	    sh "./prueba.py jacocoTestReport"
        	 	publishHTML (target: [
         	        reportDir: 'build/reports/jacoco/test/html',
         			reportFiles: 'index.html',
         			reportName: 'JacocoReport'
         	    ])
         		sh "./gradlew jacocoTestCoverageVerification"
         	}
        }
        stage('SonarQube analysis') {
            steps {
                withSonarQubeEnv('SonarQubePruebas') {
                    sh './prueba.py sonarqube'
                }
            }
        }
    }
}
