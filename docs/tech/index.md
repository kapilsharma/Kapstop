# Technical documentation #

# Layers #
Layers are used to keep applications at different level. Layers are achieved through z-index property of HTML.

Layers are broadly categorized in following groups


- **kt-container:** kt-container is main div, within which all other elements are kept. Its Z-index is 100. Any thing below 100 will be simply invisible, even when desktop is not loaded.
- **Deaktop:** Desktop layer is intended to show desktop background. Its ZIndex is 150. Any layer below 150 will also be invisible when desktop is fully loaded. Z-index from 101 to 149 are intended to show desktop loading messages and to hide any particular layer.
- **Windows:** Z-index range for windows layer is from 300 to 500. All windows should be shown with in that z-index range. KapsOs must provide a logic to maintain that Z-Index.
- **Model-Window:** ZIndex between 600-650 will be used to show model windows. KapsOs will provide the logic to set that ZIndex for model windows.
- **Alerts:** Alerts will be shown in ZIndex range 700-750.
- **OS Messages:** Although not recommended but any important system message, if needed, may be shown in range 800-850. 'Taskbar layer and status bar will appera in that zone with zindex of 825 & 826 respectively.