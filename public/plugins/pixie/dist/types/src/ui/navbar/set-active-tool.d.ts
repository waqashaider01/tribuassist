import { Object as IObject } from 'fabric/fabric-impl';
import { ToolName } from '../../tools/tool-name';
import { ActiveToolOverlay } from '../../state/editor-state';
export declare function setActiveTool(name?: ToolName | null): void;
export declare function getToolForObj(obj?: IObject): [ToolName | null, ActiveToolOverlay | null];
