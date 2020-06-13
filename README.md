# [OSS Final Project] Histhing

# 1. Histhing이란?
Histhing은 잃어버린 물건을 찾거나 찾아주는 과정을 편하게 만들어주기 위한 서비스입니다. 한동대에서 실명카톡방에 제일 많이 올라오는 글 중 하나가 바로 잃어버린 물건의 주인을 찾는 글입니다. 하지만 실명카톡방은 좋은 환경을 제공해주지 못합니다. 여러 다른 글들도 올라와서 복잡하고 검색을 하여 찾는 것도 불편합니다. 이러한 불편함을 없애기 위해 Histhing 서비스를 개발습했니다.


# 2. 특징

## 2.1. 현황 보드
홈 화면을 보면 크게 3개의 보드판을 볼 수 있다.

이는
* 전체 물품 개수
* 아직 주인을 찾지 못한 물품 개수
* 주인을 이미 찾은 물품 개수
를 알려준다.

또한 가운데 보드는 가장 최근의 올라온 물품 2개의 정보를 보여준다.

## 2.2. 물품 리스트
사용자에게 물품을  리스트 형태로 제공하여 가독성을 높였다.

### 2.2.1. 검색 기능
자신이 잃어버린 물품의 이름과 잃어버린 장소 등을 검색하여 물건을 찾을 수 있다.

### 2.2.2. 내가 올린 물품 리스트 별도 제공
자신이 올린 물품의 주인을 찾았다면 해당 물건의 상태를 ‘lost’에서 ‘found’로 바꿔야 한다. 이 때 해당 물품을 쉽게 찾을 수 있게 본인이 올린 물품 리스트를 myPage에서 볼 수 있다.

## 2.3. 사진 업로드 기능
물품의 이름과 장소만으로는 주인을 찾기 어려울 수 있다. 이를 해결하기 위해 사진 업로드 기능을 제공한다.

## 2.4. 질문/답변 기능
비싼 물품의 경우 누군가 악의적인 의도로 주인인 척 행동해 물품을 받을 수 있다. 이를 해결하기 위해 질문/답변 기능을 추가했다. 물품을 올리는 사람이 선택적으로 물품에 대한 질문과 답변을 올릴 수 있다. 질문이 걸린 물품의 경우 질문에 대한 정확한 답변을 입력하기 전까지 물품의 상세 설명, 사진, 물품 발견자 전화번호 등을 열람할 수 없다.

# 3. 개선할 점

## 3.1. 물품의 상태 변경 방법
물품의 주인이 변경을 하게 하면 악의적 의도를 가진 사용자가 아직 주인을 찾지 못한 물건의  상태 변경을 눌러버릴 수 있다고 판단했다. 그래서 물품을 발견하여 올린 유저가 주인에게 물품 전달 후 상태를 변경하도록 구현했지만 해당 유저가 물품의 상태 변경을 하지 않으면 그 물품은 영원히 ‘lost’ 상태에 남게 된다.

## 3.2. 질문/답변 기능
악의적 의도의 유저를 막기 위한 방안이지만 진짜 주인이 맞추지 못해 물품을 찾지 못하는 상황이 발생할 수 있다.

# 4. 서비스 서버 구축 방법
Apache, php, mysql은 이미 설치했다고 가정.

## 4.1. git clone
git clone을 통해 repository를 서버로 사용할 컴퓨터에 복사한다.

	git clone https://github.com/terry1213/OSS_finalproject

## 4.2. 다운 받은 repository의 하위 파일들을 /var/www/html 디렉토리로 이동
웹 서비스를 제공하기 위해 /var/www/html 로 이동시킨다.

	mv OSS_finalproject/* /var/www/html

## 4.3. uploads 디렉토리 생성
/var/www/html 에 이미지를 저장할 uploads 디렉토리를 생성한다.

	mkdir /var/www/html/uploads

## 4.4. php 설정
먼저 php.ini 파일의 위치를 찾는다.

	php --ini | grep php.ini

해당 명령어의 결과를 통해 php.ini를 수정한다.

	vim (위 명령어의 결과)

php.ini에서 file_uploads 부분을 찾아 주석을 풀고 아래와 같이 수정한다.

	file_uploads = On

upload_max_filesize 부분을 찾아 8M로 수정한다.

	upload_max_filesize = 8M
	
저장 후 닫으면 php.ini 파일 수정이 완료된다.

## 4.5. 권한 수정
파일이 업로드 되어야 하기 때문에 권한을 수정한다.

	chmod 777 /var/www/html/*

## 4.6. Apache 재시작
변경한 사항들을 적용하기 위해 Apache를 재시작하면 서버 구축을 위한 모든 준비가 끝난다.

	service apache2 restart

# 5. 기여한 부분
Histhing은 원래 존재하지 않는 서비스로 이번 프로젝트를 통해 혼자 만들어봤습니다.

## 5.1. linux(raspberrypi)
Linux(raspberrypi)를 서버 컴퓨터로 사용했습니다.

## 5.2. Apache
Apache를 통해 웹 서버를 구축했습니다.


## 5.3. mysql
mysql로 데이터베이스를 관리했습니다.

## 5.4. php
php를 통해 서버에서 웹 페이지를 관리했습니다.

## 5.5. Bootstrap 4
Bootstrap 4를 통해서 웹 페이지의 UI 디자인을 꾸몄습니다.

## 5.6. Javascript
Javascript를 통해 웹 페이지에 동적인 요소들을 추가했습니다.

## 5.7. 기타(html, css)
