# ProjectTrace
All the teams should maintain a work-log of progress made each week (This will be collected from commits on this github repo)

Final datasets and code needs to be shared via a GitHub repository (We will need to add steps see below)

## PROJECT PLAN

This project will trace the lifecycle/progress path of the projects funded by the federal agencies.

Go to the NSF website: https://www.nsf.gov/awardsearch/simpleSearchResult?queryText=CSSI 

Go to the NIH website: https://report.nih.gov/

Go to the DOE website:

Go to the DOJ website (not sure if this is the correct link: https://bja.ojp.gov/funding/expired?search=CSSI%2C+SI2%2C+DIBBS%2C+CICI%2C+MRI%2C+OAC%2C+CCF&fiscal_year=&sort_by=field_closing_date_value&sort_order=DESC#funding-opportunities-block-3-doe-2a5tck9yjpue

(if they are not easily accessible, email the departmental point-of-contact to procure the data)

Search for the awarded projects on the basis of the keywords below, export the data to CSV files, download each file separately first, and then later merge them all

CSSI, SI2, DIBBS, CICI, MRI, OAC, CCF

Perform “topic modeling” on the abstracts and titles of the awards and find the keywords that describe the awards - "Abstracts based on correlation based on content, ex say someone did parallel compute in ER1 or ER2 but we want to be able to cluster both projects together because they both have parallelization in compute in abstracts so matching projects based on award type would not be recommended"

For each project, on the basis of the keywords scrape the web to find the publications, news articles, tweets, videos, etc related to the project

Create a database on the basis of the captured data

Create a web-interface for the database

On the basis of the collected data, create a catalog of the products

On each catalog page, list all the information about the project captured from different sources in a standardized format

On the basis of the gathered information, derive insights/statistics that show the impact of the projects on the society

Please discuss the types of heuristics that you would be adopting for defining the impact of the projects with the instructor

Please secure the website appropriately

## System Design and Project Plan
### Grading Criteria
Software engineering
guidelines should be
followed and the
project plan should
be prepared and
discussed with the
instructor ✅
### Notes
Submit the project
plan over email and
receive approval,
then work on the
system design and
discuss with the
instructor
![SystemDesignApproval](https://github.com/EduardoTrevino/ProjectTrace/blob/master/System%20Design%20and%20Project%20Plan.jpg?raw=true)

## Data Gathering
### Grading Criteria
The data is collected
from the agreed
upon or discussed
sources, and the
code for collecting
data is fullyfunctional
### Notes
Implement the
code/scripts for
automatic data
collection and data
cleaning

Data has been collected under the data folder for NSF, NIH DOE ✅ **See "Data collection" in project outline**

DOJ is **SCRATCHED**

Data cleaning for merging of the datasets is ✅ **See "Abstract cleaning & further processing" in project outline**

## Database/Data Repository Creation
### Grading Criteria
The database is setup on a server that is
reachable via a webinterface
### Notes
Create a database
and/or a repository
that can be queried
for generating
reports

## User-Interface (web-interface, applicable dashboards and statistics)
### Grading Criteria
The interface should
include a search
feature according to
the project being
implemented;
Project-specific
features as discussed
with the instructor
should be
implemented
### Notes
Support user
accounts were
applicable, the webinterface should be
tested across
different browsers

## Features Delivered
### Grading Criteria
All the
discussed/agreed
upon features should
be implemented and
code should be
shared via a GitHub
repository
### Notes
A fully-functional
code with steps to
install (README file)
A test-plan to test all
the features
implemented should
be submitted

## Presentation & Team Work
### Grading Criteria
A video-recording of
the presentation
should be submitted
by each team,
worklog should be
shared, in-class
presentation is also
required
### Notes
The presentation
should include a
demonstration of the
working prototype
All team members
should be
appropriately
engaged
Worklog should be
shared to track
progress on the
project

## Report/Paper
### Grading Criteria
A paper on the
project
### Notes
The report/paper
should be of a
publishable quality

## Security
### Grading Criteria
The project website
should use https and
not http
### Notes
The test-plan should
consider testing for
security
vulnerabilities

# Project Outline
## Data collection
Eduardo has Data collected 3 folders each representing an agency (DOE, NIH, NSF), as you can tell we are missing DOJ, I have emailed them but they have not gotten back to me so either we find an online database that has them for me, or maybe there exists a website that I have not ran into yet.

Inside each folder I have placed all their availble data on the basis of the following keywords CSSI, SI2, DIBBS, CICI, MRI, OAC, CCF. If there is a keyword missing under {AGENCYNAME}_{KEYWORD} it is because there was NO AWARD for that agency in that keyword.

To get started on topic modeling:
Our goal is to perform topic modeling on the abstracts and titles of the awards and find the keywords that describe the awards.

1. Preprocess the text data: Remove stop words, punctuation, and other unnecessary characters from the abstracts and titles. Tokenize the text into individual words or phrases, and stem or lemmatize the words to reduce the dimensionality of the dataset.

2. Create a document-term matrix: This matrix will represent the frequency of occurrence of each term in each document. Each row in the matrix represents a document (i.e., an abstract or title), and each column represents a term. (Rememeber EX. we did in R in class)

3. Choose a topic modeling algorithm: There are several popular algorithms for topic modeling, including Latent Dirichlet Allocation (LDA), Non-negative Matrix Factorization (NMF), and Latent Semantic Analysis (LSA). I (Eduardo) have decided to use a LDA model using Gensim.

4. Train the model. This will assign a weight to each term in each topic, indicating how strongly that term is associated with that topic.

5. Analyze the output of the topic model to identify the most relevant topics and the keywords associated with each topic. Examine the top words or phrases in each topic, as well as the probability of each document belonging to each topic.

### Code prep and Guide

Libraies 
```
pip install nltk
pip install gensim
pip install pandas
```

Go on the python notebook (If you wanted to learn R, I didnt use R so you'll have to use a language translator to know what is going on) 

In english what is going on is you will see how I first got all the data from the .csv files which are from the NSF dataset, and NIH datasets and merged the abstracts and titles of them into a pandas dataframe where I appended that into a list. 

Then I did the same for the excel files.

Concatenated into a data frame.

Exported into a csv file (this is good practice to see the preprocessing was done correctly, and serve as a middle point).

Tokenize

Stop words

Stem words

Frequency Dictionary

Document Term matrix

LDA model

Print topics and top keywords. We will use this to scrape the web.




Note that the naming convention we used is:

{Author}_{Algorithm}_{Tokenized}_{STEM or LEM}_{Stopwords rem}


## Abstract cleaning & further processing

For this part of the text we are using a LDA model for each paper in each document to get the top 8 topics of each paper, to cut out the noise we are focusing on the NSF dataset which contains the following segements of information: "AwardNumber", "Title", "NSFOrganization", "PrincipalInvestigator", "PIEmailAddress", "Abstract"
