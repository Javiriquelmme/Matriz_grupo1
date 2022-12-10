pipeline {
    agent any
    triggers {
        pollSCM('* * * * *')
    }
    
       stage('Sonaquebe Analysis'){
        def scannerHome = tool 'sonarqube';
        withSonarQuebeEnv('sonarqube'){
            sh "${scannerHome}/bin/sonar-scanner \
            -D sonar.login=admin \
            -D sonar.pasword=pass \
            -D sonar.projectKey=scseba \
            -D sonar.exclusions=vendor/**,resources/**/*.java \
            -D sonar.host.url=http://192.168.145.135:9000/"
        }
}
