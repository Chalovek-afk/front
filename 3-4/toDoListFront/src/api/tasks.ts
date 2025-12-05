import apiClient from "./apiClient";

export type Task = {
  id: number;
  text: string;
  checked: boolean;
};

export type TaskCreate = { text: string };
export type TaskUpdate = { text?: string; checked?: boolean };

export const getTasks = () =>
  apiClient.get<Task[]>("/tasks/").then((res) => res.data);

export const createTask = (task: TaskCreate) =>
  apiClient.post<Task>("/tasks/", task).then((res) => res.data);

export const updateTask = (id: number, data: TaskUpdate) =>
  apiClient.patch<Task>(`/tasks/${id}/`, data).then((res) => res.data);

export const deleteTask = (id: number) =>
  apiClient.delete<Task>(`/tasks/${id}/`).then((res) => res.data);

export const updateAllTasks = (data: { checked: boolean }) =>
  apiClient
    .patch<{ message: string; count: number }>("/tasks/", data)
    .then((res) => res.data);

export const deleteCompletedTasks = () =>
  apiClient
    .delete<{ message: string; count: number }>("/tasks/")
    .then((res) => res.data);
