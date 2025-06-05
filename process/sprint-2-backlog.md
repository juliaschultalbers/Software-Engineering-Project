<!--- 
This document is a template with a proposal for the structure of the sprint backlogs.  
Feel free to change and adapt the structure of the document!  
---> 


# Sprint 2
period: 09.05. to 23.05

## Participants 
<!---
Add who has which role in this sprint: 
There are four sprints. 4 of 6 team members should act as a scrum master once. 
--->
- product owner: all
- scrum master: Kelly Xie
- developer 1: Sopheavisal Lim
- developer 2: Jonas Weber
- developer 3: Kevin Do
- developer 4: Julia Schultalbers
- developer 5: Martin Oertel

## Product backlog items 
<!--- Add the user stories you will work on in this sprint. ---> 
- Als System möchte ich den Urlaubsantragsprozess strukturiert abbilden, damit alle Schritte nachvollziehbar sind
- Als System möchte ich Personalengpässe automatisch erkennen, damit rechtzeitig Maßnahmen eingeleitet werden
- Als System möchte ich den Abstimmungsprozess für Mahlzeiten zeitgesteuert durchführen, damit alle Kinder teilnehmen können
- Als System möchte ich Abstimmungsergebnisse automatisch verarbeiten, damit die Speisepläne aktualisiert werden
- Als Entwickler möchte ich die Kommunikation zwischen Systemkomponenten verstehen, damit die Integration erfolgreich ist
- Als Entwickler möchte ich die zeitlichen Abhängigkeiten modellieren, damit das System korrekt funktioniert

## Sprint planing 
<!--- Add which tasks you plan. ---> 
- planned activities:
    - Erstellung von Extended Finite State Machines für Scheduling und Meal-Voting
    - Entwicklung des UML Activity Diagrams für Gesamtprozessübersicht
    - Modellierung der UML Communication Diagrams für Objektinteraktionen
    - Entwurf der UML Sequence Diagrams für zeitliche Abläufe
    - Implementation der Time Petri Nets für zeitbasierte Modellierung
    - Dokumentation aller Verhaltensmodelle 

<!---
How do you plan to realize the activities? 
Do you work in a group on the models, or do you divide the creation and description of the models among your team members? 
How many meetings do you plan? Do you use tools for collaborative work, e.g. HedgeDoc? 
---> 
- work organization:
    - Vier strukturierte Sprint-Meetings:
      Meeting 1: Anforderungsanalyse für Verhaltensmodelle
      Meeting 2: EFSM-Design und Activity-Modeling
      Meeting 3: Sequence/Communication-Diagramme
      Meeting 4: Integration und TAPN-Verifikation

    - Aufgabenverteilung nach Spezialisierung:
      Kelly Xie -> Extended Finite State Machines
      Sopheavisal Lim -> UML Activity Diagram
      Jonas Weber -> UML Communication Diagram
      Kevin Do -> UML Sequence Diagram
      Julia Schultalbers -> TAPN
      Martin Oertel -> Dokumentation und Model-description

    - Kollaborationstools:
      Discord für Team-Meetings
      TAPAAL für TAPN-Modellierung
      GitLab für Versionskontrolle

## Product increments 
<!---
"Increment is the sum of all the Product Backlog items completed during a Sprint and the value of the increments of all previous Sprints." 
See https://www.softwaretestinghelp.com/scrum-artifacts/
---> 
- Extended Finite State Machines für Scheduling-System mit Urlaubsworkflow und Favorite-Meal-System mit Voting-Zyklus
- UML Activity Diagram mit Swimlanes für alle Akteure und parallele Prozesse
- UML Communication Diagram für Objektkollaboration zwischen allen Systemkomponenten
- UML Sequence Diagram für zeitkritische Abläufe im Scheduling und Voting-System
- Time Petri Nets mit zeitbasierter Modellierung und Deadlock-Analyse
- Vollständige Systemarchitektur mit Komponentenintegration und Schnittstellen
- Dokumentation aller Verhaltensmodelle mit formaler Spezifikation


## Sprint review (possibly with external stakeholders) 
<!--- Answer the following questions in your team. --->
- Which tasks could your team finish, and which could not?
Abgeschlossene Aufgaben:
Grundlegende User Stories für Verhaltensmodellierung
Alle geplanten Diagrammtypen erfolgreich erstellt

Noch ausstehende Aufgaben:
Detaillierte User Stories für komplexe Szenarien noch in Bearbeitung
Feintuning der zeitlichen Parameter in TAPN-Modellen

- What was challenging in the development?
Krankheitsbedingte Ausfälle im Team erschwerten die Koordination
Transfer von Vorlesungsinhalten in praktische Anwendung war anspruchsvoller als erwartet
Synchronisation verschiedener Modellierungstools erforderte zusätzlichen Aufwand


## Sprint retrospective (only with the team)
<!--- Answer the following questions in your team. ---> 
- What did the scrum master do to serve the development team and the organization?
  Kelly Xie führte vier strukturierte Meetings durch und ermöglichte trotz Herausforderungen kontinuierliche Fortschrittskontrolle durch flexibles Timeboxing und proaktive Koordination.

- Name at least one aspect of your teamwork that went well.
  Die Hilfsbereitschaft und offene Kommunikation im Team waren herausragend - trotz individueller Belastungen unterstützten sich alle Mitglieder gegenseitig.

- Name at least one aspect of your teamwork that did not go well.
  Das Team sieht aktuell keine größeren Schwachstellen in der Zusammenarbeit, die etablierten Prozesse funktionieren effektiv.

- Do you have ideas on how to improve your teamwork?
  Für kommende Sprints ist eine noch präzisere Timeboxing-Strategie geplant, um die Effizienz der Meetings weiter zu steigern und mehr Zeit für die praktische Umsetzung zu schaffen.

