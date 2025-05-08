<!--- 
This document is a template with a proposal for the structure of the sprint backlogs.  
Feel free to change and adapt the structure of the document!  
---> 


# Sprint 1
period: 28.04. to 08.04.

## Participants 
<!---
Add who has which role in this sprint: 
There are four sprints. 4 of 6 team members should act as a scrum master once. 
--->
- product owner: all
- scrum master: Sopheavisal Lim
- developer 1: Kelly Xie
- developer 2: Jonas Weber
- developer 3: Kevin Do
- developer 4: Julia Schultalbers
- developer 5: Martin Oertel

## Product backlog items 
<!--- Add the user stories you will work on in this sprint. ---> 
- Als Erzieher*in möchte ich Urlaubsanfragen einreichen können, damit meine Abwesenheiten im Dienstplan berücksichtigt werden
- Als Erzieher*in möchte ich Krankheitstage melden können, damit der Dienstplan entsprechend angepasst werden kann
- Als Kind möchte ich für meine Lieblingsgerichte abstimmen können, damit meine Essenspräferenzen berücksichtigt werden
- Als Küchenpersonal möchte ich neue Gerichte hinzufügen und bearbeiten können, damit das Speisenangebot aktuell bleibt
- Als Management möchte ich einen Überblick über die Personalbesetzung haben, damit ich Engpässe frühzeitig erkennen kann


## Sprint planing 
<!--- Add which tasks you plan. ---> 
- planned activities:
    - Entwurf und Erstellung des UML-Klassendiagramms
    - Entwurf und Erstellung des Use-Case-Diagramms
    - Definition von OCL-Invarianten zur Sicherstellung der Datenintegrität
    - Definition von OCL-Pre- und Post-Conditions für wichtige Systemoperationen
    - Dokumentation und Beschreibung der Modelle
      
<!---
How do you plan to realize the activities? 
Do you work in a group on the models, or do you divide the creation and description of the models among your team members? 
How many meetings do you plan? Do you use tools for collaborative work, e.g. HedgeDoc? 
---> 
- work organization:       
    - Drei strukturierte Sprint-Meetings: 
        Kickoff: Anforderungsanalyse & Grobentwurf
        Mid-Sprint: Detailarbeit & Peer-Reviews
        Finalisierung: Qualitätssicherung & Integration
    - Fließbandprinzip für Dokumentationserstellung:
        Sopheavisal Lim -> Use-Case-Diagramm
        Kelly Xie -> UML-Diagramm
        Jonas Weber -> OCL-Invarianten
        Kevin Do -> Pre/Post-Conditions
        Julia Schultalbers -> Modelldokumentation
        Martin Oertel -> Gesamtintegration
    - Unsere Kollaborationstools:
        Discord für Meetings und Live-Zusammenarbeit
        Gitlab für Versionskontrolle


## Product increments 
<!---
"Increment is the sum of all the Product Backlog items completed during a Sprint and the value of the increments of all previous Sprints." 
See https://www.softwaretestinghelp.com/scrum-artifacts/
---> 
- UML-Klassendiagramm mit allen relevanten Klassen, Attributen, Operationen und Beziehungen
- Use-Case-Diagramm zur Visualisierung der Systemfunktionalitäten und Benutzerinteraktionen
- OCL-Invarianten zur Sicherstellung der Datenintegrität
- OCL-Pre- und Post-Conditions für wichtige Systemoperationen
- Dokumentation der Modelle und ihrer Bedeutung


## Sprint review (possibly with external stakeholders) 
<!--- Answer the following questions in your team. --->
- Which tasks could your team finish, and which could not?
Abgeschlossene Aufgaben:
    Erste UML-Modellierung
    OCL-Constraint-Implementierung
    Dokumentation

Offene Punkte:
    Fehlende Detailbeschreibungen für Use-Cases
    Unvollständige Testfälle für Abstimmungssystem

- What was challenging in the development?
    Komplexitätsmanagement bei OCL-Formalismen
    Synchronisation paralleler Arbeitsstränge
    Universitäts-spezifische Scope-Definition ("Academic vs. Real-World"-Anforderungen)


## Sprint retrospective (only with the team)
<!--- Answer the following questions in your team. ---> 
- What did the scrum master do to serve the development team and the organization? 
Effiziente Moderation, klares Timeboxing und gute Teamführung – alle Meetings waren strukturiert und zielorientiert.

- Name at least one aspect of your teamwork that went well. 
Sehr gute Abstimmung und enge Zusammenarbeit im Team, besonders bei Live-Arbeitsphasen.

- Name at least one aspect of your teamwork that did not go well. 
Die Terminfindung war schwierig, da nicht immer alle gleichzeitig Zeit hatten.

- Do you have ideas on how to improve your teamwork? 
Feste, regelmäßige Meetingzeiten könnten die Koordination erleichtern – ansonsten ist das Team sehr zufrieden mit der Zusammenarbeit.
